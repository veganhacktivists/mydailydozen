<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailType extends Model
{
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
