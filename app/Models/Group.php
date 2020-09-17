<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    /**
     * Mass-assignable variables.
     *
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'name',
        'icon_location',
        'banner_location',
        'per_day',
        'checked',
        'recorded_at',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('checked', 'recorded_at');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function servingSizes(): HasMany
    {
        return $this->hasMany(ServingSize::class);
    }

    public function detailTypes(): HasMany
    {
        return $this->hasMany(DetailType::class);
    }
}
