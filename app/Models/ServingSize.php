<?php

namespace App\Models;

use Eloquent;
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
 * @method static \Illuminate\Database\Eloquent\Builder|ServingSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServingSize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServingSize query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServingSize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServingSize whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServingSize whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServingSize whereSizeImperial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServingSize whereSizeMetric($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServingSize whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ServingSize extends Model
{
    protected $fillable = [
        'size_imperial',
        'size_metric',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
