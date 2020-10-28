<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class ContactTicket
 * When a user uses the contact form.
 * @package App\Models
 */
class ContactTicket extends Model
{
    /**
     * Mass assignable
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'message',
    ];
}
