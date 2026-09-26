<?php

namespace App\Http\Middleware;

use Closure;
use DateTimeZone;
use Illuminate\Http\Request;

class RememberTimezone
{
    // The browser writes its timezone to this cookie, so each user's day is their own
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $timezone = $request->cookie('timezone');

        if ($user && $timezone && $timezone !== $user->timezone && in_array($timezone, DateTimeZone::listIdentifiers(), true)) {
            $user->forceFill(['timezone' => $timezone])->save();
        }

        return $next($request);
    }
}
