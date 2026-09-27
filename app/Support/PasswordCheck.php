<?php

namespace App\Support;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

// Password checks behind the login: changing the email or password, and deleting the account.
// Five wrong guesses a minute per user, so a borrowed session can't keep trying.
class PasswordCheck
{
    private const ATTEMPTS = 5;

    public static function ensure($user, ?string $password, string $field, string $message, string $bag = 'default'): void
    {
        $key = 'password-check:'.$user->getKey();

        if (RateLimiter::tooManyAttempts($key, self::ATTEMPTS)) {
            throw ValidationException::withMessages([$field => __('passwords.throttled')])->errorBag($bag);
        }

        if (! Hash::check((string) $password, $user->password)) {
            RateLimiter::hit($key, 60);

            throw ValidationException::withMessages([$field => $message])->errorBag($bag);
        }
    }
}
