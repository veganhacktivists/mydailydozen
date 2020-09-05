<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
