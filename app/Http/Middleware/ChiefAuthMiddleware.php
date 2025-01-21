<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class ChiefAuthMiddleware
{
    private const MAX_ATTEMPTS = 5;
    private const LOCKOUT_MINUTES = 30;

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return $next($request);
        }

        if (!$request->isMethod('post') || !$request->routeIs('filament.*')) {
            return redirect()->to(Filament::getLoginUrl());
        }

        if ($this->isIpThrottled($request->ip())) {
            return $this->handleThrottledResponse();
        }

        return $this->attemptAuthentication($request);
    }

    private function attemptAuthentication(Request $request): RedirectResponse
    {
        $validEmail = Config::get('auth.chief.email');
        $validPasswordHash = Config::get('auth.chief.password');

        if (!$validEmail || !$validPasswordHash) {
            Log::error('Chief authentication credentials not properly configured');
            return back()->with('error', 'System configuration error');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($this->isValidCredentials($credentials, $validEmail, $validPasswordHash)) {
            return $this->handleSuccessfulLogin($request);
        }

        return $this->handleFailedLogin($request, $credentials['email']);
    }

    private function isValidCredentials(array $credentials, string $validEmail, string $validPasswordHash): bool
    {
        return $credentials['email'] === $validEmail && 
               Hash::check($credentials['password'], $validPasswordHash);
    }

    private function handleSuccessfulLogin(Request $request): RedirectResponse
    {
        $this->clearLoginAttempts($request->ip());
        
        $request->session()->regenerate();
        Auth::loginUsingId(Config::get('auth.chief.user_id', 1));
        
        Log::info('Chief successful login', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);
        
        return redirect()->intended(Filament::getUrl());
    }

    private function handleFailedLogin(Request $request, string $email): RedirectResponse
    {
        $this->incrementLoginAttempts($request->ip());

        Log::error('Chief authentication failed', [
            'ip' => $request->ip(),
            'email' => $email,
            'user_agent' => $request->userAgent()
        ]);

        return back()
            ->withErrors(['email' => __('filament::login.messages.failed')])
            ->withInput($request->except('password'));
    }

    private function handleThrottledResponse(): RedirectResponse
    {
        return back()->with('error', 'Too many login attempts. Please try again later.');
    }

    private function isIpThrottled(string $ip): bool
    {
        $attempts = Cache::get($this->getLoginAttemptsCacheKey($ip), 0);
        return $attempts >= self::MAX_ATTEMPTS;
    }

    private function incrementLoginAttempts(string $ip): void
    {
        $key = $this->getLoginAttemptsCacheKey($ip);
        $attempts = Cache::get($key, 0) + 1;
        
        Cache::put($key, $attempts, Carbon::now()->addMinutes(self::LOCKOUT_MINUTES));
    }

    private function clearLoginAttempts(string $ip): void
    {
        Cache::forget($this->getLoginAttemptsCacheKey($ip));
    }

    private function getLoginAttemptsCacheKey(string $ip): string
    {
        return 'login_attempts_chief_' . md5($ip);
    }
}