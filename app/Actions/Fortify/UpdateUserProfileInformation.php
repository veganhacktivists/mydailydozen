<?php

namespace App\Actions\Fortify;

use App\Notifications\EmailChanged;
use App\Support\PasswordCheck;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ])->validateWithBag('updateProfileInformation');

        $oldEmail = $user->email;
        $emailChanged = strcasecmp($input['email'], $oldEmail) !== 0;

        // A signed-in session alone isn't enough to move the account, and its reset emails, to another inbox
        if ($emailChanged) {
            PasswordCheck::ensure($user, $input['current_password'] ?? '', 'current_password', __('The provided password does not match your current password.'), 'updateProfileInformation');
        }

        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
        ])->save();

        if ($emailChanged) {
            dispatch(fn () => Notification::route('mail', $oldEmail)->notify(new EmailChanged($user->email)))->afterResponse();
        }
    }
}
