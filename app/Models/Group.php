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

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('checked', 'recorded_at', 'in_use');
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function servingSizes()
    {
        return $this->hasMany(ServingSize::class);
    }

    public function detailTypes()
    {
        return $this->hasMany(DetailType::class);
    }
}
