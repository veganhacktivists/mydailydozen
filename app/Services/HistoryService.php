<?php

namespace App\Services;

use Carbon\CarbonPeriod;

class HistoryService {

    const DATE_FORMAT = 'Y-m-d';

    public function buildForUser ($user) {
        $userGroups = $user->groups;
        $total = $userGroups->groupBy('pivot.recorded_at');
        $groupedEntries = $userGroups->pluck('pivot')->groupBy('recorded_at');
        $groupedEntriesKeys = $groupedEntries->keys();
        $endDate = date(self::DATE_FORMAT);

        if(sizeof($groupedEntriesKeys) > 0) {
            $endDate = array_values(array_slice($groupedEntriesKeys->toArray(), -1))[0];
        }

        $filledEntries = $this->fillMissingDates($user->created_at, $endDate);
        $entries = collect($filledEntries)->merge($groupedEntries);

        return $entries->map(fn ($item, $key) => [
                'year' => substr($key, 0, 4),
                'month' => substr($key, 5, 2),
                'day' => substr($key, 8, 2),
                'count' => $item->sum('checked'),
                'total' => isset($item[0]->recorded_at) ? $total[$item[0]->recorded_at]->sum('per_day') : null
        ]);
    }

    private function fillMissingDates ($startDate, $endDate) {
        $startDate = $startDate->format(self::DATE_FORMAT);
        $period = new CarbonPeriod($startDate, $endDate);
        $dates = [];

        foreach ($period as $date) {
            $dates[$date->format(self::DATE_FORMAT)] = collect([[ 'checked' => 0 ]]);
        }

        return $dates;
    }
}
