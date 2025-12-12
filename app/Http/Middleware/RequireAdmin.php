<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RequireAdmin
{
    public function handle($request, Closure $next)
    {
        // user must be logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // user must be admin
        if (!Auth::user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
