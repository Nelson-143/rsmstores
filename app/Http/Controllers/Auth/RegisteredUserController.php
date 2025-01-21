<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Application;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create(): \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|Application
    {
        return view('auth.register');
    }

    /**
     * Handle registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the registration form inputs
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms-of-service' => ['required'],
        ]);

        // Create a new user
        $user = User::create([
            'uuid' => \Illuminate\Support\Str::uuid(),
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'SuperAdmin',
        ]);

        // Log in the newly registered user
        Auth::login($user);

        // Dispatch the Registered event to trigger email verification
        event(new Registered($user));

        // Redirect the user to the email verification notice page
        return redirect()->route('verification.notice');
    }
}
