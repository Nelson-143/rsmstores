<?php

namespace app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user() && auth()->user()->role === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
