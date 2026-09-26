<?php

namespace App\Services;

use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class HistoryService {

    const DATE_FORMAT = 'Y-m-d';

    public function buildForUser ($user) {
        $recorded = DB::table('group_user')
            ->join('groups', 'groups.id', '=', 'group_user.group_id')
            ->where('group_user.user_id', $user->id)
            ->groupBy('group_user.recorded_at')
            ->orderBy('group_user.recorded_at')
            ->get([
                'group_user.recorded_at',
                DB::raw('sum(group_user.checked) as count'),
                DB::raw('sum(groups.per_day) as total'),
            ])
            ->mapWithKeys(fn ($day) => [
                substr($day->recorded_at, 0, 10) => ['count' => (int) $day->count, 'total' => (int) $day->total],
            ]);

        $endDate = $recorded->keys()->last() ?? date(self::DATE_FORMAT);
        $entries = collect($this->fillMissingDates($user->created_at, $endDate))->merge($recorded);

        return $entries->map(fn ($item, $key) => [
                'year' => substr($key, 0, 4),
                'month' => substr($key, 5, 2),
                'day' => substr($key, 8, 2),
                'count' => $item['count'],
                'total' => $item['total'],
        ]);
    }

    private function fillMissingDates ($startDate, $endDate) {
        $startDate = $startDate->format(self::DATE_FORMAT);
        $period = new CarbonPeriod($startDate, $endDate);
        $dates = [];

        foreach ($period as $date) {
            $dates[$date->format(self::DATE_FORMAT)] = ['count' => 0, 'total' => null];
        }

        return $dates;
    }
}
