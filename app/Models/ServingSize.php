<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\ServingSize
 *
 * @property int $id
 * @property int $group_id
 * @property string $size_imperial
 * @property string $size_metric
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Group $group
 * @method static Builder|ServingSize newModelQuery()
 * @method static Builder|ServingSize newQuery()
 * @method static Builder|ServingSize query()
 * @method static Builder|ServingSize whereCreatedAt($value)
 * @method static Builder|ServingSize whereGroupId($value)
 * @method static Builder|ServingSize whereId($value)
 * @method static Builder|ServingSize whereSizeImperial($value)
 * @method static Builder|ServingSize whereSizeMetric($value)
 * @method static Builder|ServingSize whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ServingSize extends Model
{
    protected $fillable = [
        'size_imperial',
        'size_metric',
    ];

    /**
     * The My Daily Dozen food group, beans, blueberries, etc.
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
