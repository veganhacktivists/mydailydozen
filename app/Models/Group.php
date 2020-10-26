<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Group
 *
 * This is a My Daily Dozen food group.
 * Beans, blueberries, etc.
 *
 * @property int $id
 * @property string $category_id
 * @property string $name
 * @property string $icon_location
 * @property string $banner_location
 * @property int $per_day
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read Collection|DetailType[] $detailTypes
 * @property-read int|null $detail_types_count
 * @property-read Collection|ServingSize[] $servingSizes
 * @property-read int|null $serving_sizes_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereBannerLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereIconLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePerDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    /**
     * There's a pivot table between the Users and Groups.
     * This records the check marks for the food groups on the home screen.
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('checked', 'recorded_at', 'in_use');
    }

    /**
     * This lets us know if it's a key food group, a tweak, etc.
     * @return HasMany
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    /**
     * ServingSizes
     * @return HasMany
     */
    public function servingSizes()
    {
        return $this->hasMany(ServingSize::class);
    }

    public function detailTypes()
    {
        return $this->hasMany(DetailType::class);
    }

    public function checkedToInput($index)
    {
        if ($index < $this->checked)
        {
            return ' checked';
        }
        return '';
    }
}
