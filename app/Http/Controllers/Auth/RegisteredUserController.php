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
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\VerifyEmail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'uuid' => Str::uuid(),
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'SuperAdmin',
        ]);

        // Log in the newly registered user
        Auth::login($user);
          // Log in the newly registered user
    Auth::login($user);

    // Generate and store the email verification token
    $token = Str::random(64);
    EmailVerification::create([
        'user_id' => $user->id,
        'email' => $user->email,
        'token' => $token,
        'expires_at' => Carbon::now()->addHours(24),
    ]);

    // Send the verification email
Mail::raw('Please verify your email address by clicking the link below: ' . route('auth.verify-email', $token), function ($message) use ($user) {
    $message->to($user->email);
});
        // Dispatch the Registered event to trigger email verification
        event(new Registered($user));

// If first user, make them Super Admin
if (User::count() == 1) {
    $user->assignRole('Super Admin');
} else {
    $user->assignRole('User'); // Default for other users
}

   // Redirect to the onboarding page with a success message
   return redirect()->route('auth.onboarding')->with('status', 'Please check your email to verify your account.');
    }

}
