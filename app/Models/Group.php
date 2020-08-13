<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * Mass-assignable variables.
     *
     * @var string[]
     */
    protected $fillable = [
        'category',
        'group_nid',
        'name',
        'icon_location',
        'banner_location',
        'serving_sizes',
        'detail_types',
        'per_day',
    ];

    /**
     * Return the Daily Dozen core food groups.
     *
     * @param $query
     */
    public function scopeDailyDozen($query): Builder
    {
        return $query->where('category', 'daily_dozen');
    }

    /**
     * Return the Supplements.
     *
     * @param $query
     */
    public function scopeSupplements($query): Builder
    {
        return $query->where('category', 'supplements');
    }

    /**
     * Return the Tweaks.
     *
     * @param $query
     */
    public function scopeTweaks($query): Builder
    {
        return $query->where('category', 'tweaks');
    }
}
