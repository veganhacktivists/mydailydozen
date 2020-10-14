<?php

namespace App\Observers;

use App\Models\Group;
use App\Models\User;

class UserObserver
{
    /**
     * Add the daily dozen to the user.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user)
    {
        Group::where('category_id', 1)->each(function ($group) use ($user) {
            $user->toggleGroup($group);
        });
    }
}
