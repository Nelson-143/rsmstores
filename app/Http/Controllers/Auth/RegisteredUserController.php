<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Branch;
use App\Models\Account;
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
             'branch_name' => ['required', 'string', 'max:255'],
             'account_name' => ['required', 'string', 'max:255'], // Validate branch name
             'password' => ['required', 'confirmed', Rules\Password::defaults()],
             'terms-of-service' => ['required'],
         ]);
         
     // Create a new account and associate it with the user
     $account = Account::create([
        'name' => $request->account_name,
     ]);
     $branch = Branch::create([
        'name' => $request->branch_name,
       // Set the created_by field to the user's ID
    ]);
         // Create a new user
         $user = User::create([
             'uuid' => Str::uuid(),
             'username' => $request->username,
             'name' => $request->name,
             'email' => $request->email,
             'branch_id' => $branch->id,
             'account_id' => $account->id, // Associate the user with the branch
             'password' => Hash::make($request->password),
         ]);
     

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
     
    // Construct the verification URL correctly
    $verificationUrl = route('verification.verify', ['token' => $token]);

    // Send the verification email
    Mail::to($user->email)->send(new VerifyEmail($verificationUrl));
     
         // Assign Super Admin role to every registered user
         $user->assignRole('Super Admin');
     
         // Redirect to the dashboard with a notification
         return redirect()->route('dashboard')->with('status', 'Please check your email to verify your account.');
     }
     
 
}
