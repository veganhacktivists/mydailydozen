<?php

namespace App\Services;

use Carbon\CarbonPeriod;

class HistoryService {
    public function buildForUser ($user) {
        $userGroups = $user->groups;
        $total = $userGroups->groupBy('pivot.recorded_at');
        $groupedEntries = $userGroups->pluck('pivot')->groupBy('recorded_at');
        $groupedEntriesKeys = $groupedEntries->keys();

        $endDate = array_values(array_slice($groupedEntriesKeys->toArray(), -1))[0];

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
        $startDate = $startDate->format('Y-m-d');
        $period = new CarbonPeriod($startDate, $endDate);
        $dates = [];

        foreach ($period as $date) {
            $dates[$date->format('Y-m-d')] = collect([[ 'checked' => 0 ]]);
        }

        return $dates;
    }
}
