<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSubscription
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user->subscription || now()->greaterThan($user->subscription->ends_at)) {
            return redirect()->route('subscriptions.index')->with('error', 'Your subscription has expired.');
        }

        return $next($request);
    }
}
