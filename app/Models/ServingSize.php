<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServingSize extends Model
{
    protected $fillable = [
        'size_imperial',
        'size_metric',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
