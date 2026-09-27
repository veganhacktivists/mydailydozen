<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        // These tables have no foreign keys, so nothing cascades
        DB::transaction(function () use ($user) {
            DB::table('group_user')->where('user_id', $user->id)->delete();
            DB::table('use_tracker')->where('user_id', $user->id)->delete();
            DB::table(config('auth.passwords.users.table'))->where('email', $user->email)->delete();
            DB::table('sessions')->where('user_id', $user->id)->delete();
            $user->tokens()->delete();
            $user->deleteProfilePhoto();
            $user->delete();
        });
    }
}
