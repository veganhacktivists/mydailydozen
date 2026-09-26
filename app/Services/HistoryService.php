<?php

namespace App\Services;

use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class HistoryService {

    const DATE_FORMAT = 'Y-m-d';

    public function buildForUser ($user) {
        // Every day is measured against the foods the user tracks now; the app doesn't keep past selections
        $groups = $user->currentGroups()->get(['groups.id', 'groups.per_day']);
        $total = (int) $groups->sum('per_day');

        $recorded = DB::table('group_user')
            ->join('groups', 'groups.id', '=', 'group_user.group_id')
            ->where('group_user.user_id', $user->id)
            ->whereIn('group_user.group_id', $groups->pluck('id'))
            ->groupBy('group_user.recorded_at')
            ->orderBy('group_user.recorded_at')
            ->get([
                'group_user.recorded_at',
                DB::raw('sum(case when group_user.checked > groups.per_day then groups.per_day else group_user.checked end) as count'),
            ])
            ->mapWithKeys(fn ($day) => [substr($day->recorded_at, 0, 10) => (int) $day->count]);

        $endDate = $recorded->keys()->last() ?? $user->today()->format(self::DATE_FORMAT);
        $entries = collect($this->fillMissingDates($user->created_at, $endDate))->merge($recorded);

        return $entries->map(fn ($count, $key) => [
                'year' => substr($key, 0, 4),
                'month' => substr($key, 5, 2),
                'day' => substr($key, 8, 2),
                'count' => $count,
                'total' => $total,
        ]);
    }

    private function fillMissingDates ($startDate, $endDate) {
        $startDate = $startDate->format(self::DATE_FORMAT);
        $period = new CarbonPeriod($startDate, $endDate);
        $dates = [];

        foreach ($period as $date) {
            $dates[$date->format(self::DATE_FORMAT)] = 0;
        }

        return $dates;
    }
}
