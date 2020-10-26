<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\DetailType
 *
 * @property int $id
 * @property int $group_id
 * @property string $name
 * @property string $video
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Group $group
 * @method static \Illuminate\Database\Eloquent\Builder|DetailType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailType whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailType whereVideo($value)
 * @mixin \Eloquent
 */
class DetailType extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
