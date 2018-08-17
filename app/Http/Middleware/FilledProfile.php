<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class FilledProfile
{
    public function handle($request, \Closure $next)
    {
        $user = Auth::user();

        if (!$user->hasFilledProfile()) {
            return redirect()
                ->route('cabinet.profile.home', 1);
        }

        return $next($request);
    }
}
