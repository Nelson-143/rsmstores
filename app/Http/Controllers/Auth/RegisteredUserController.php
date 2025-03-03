<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Branch;
use App\Models\Account;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\VerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle the registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the registration form inputs
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'branch_name' => ['required', 'string', 'max:255'],
            'account_name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms-of-service' => ['required'],
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create a new account
            $account = Account::create([
                'name' => $request->account_name,
            ]);
            Log::info('Account created', ['account' => $account]);

                        // Create a new branch and associate it with the account
                $branch = Branch::create([
                    'name' => $request->branch_name,
                    'account_id' => $account->id, // Associate the branch with the account
                ]);
            Log::info('Branch created', ['branch' => $branch]);

            // Create a new user and associate it with the account and branch
            $user = User::create([
                'uuid' => Str::uuid(),
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'account_id' => $account->id, // Associate the user with the account
                'branch_id' => $branch->id, // Associate the user with the branch
            ]);
            Log::info('User created', ['user' => $user]);

            // Log in the newly registered user
            Auth::login($user);
            Log::info('User logged in', ['user' => $user]);
            // Generate and store the email verification token
            $token = Str::random(64);
            EmailVerification::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'token' => $token,
                'expires_at' => Carbon::now()->addHours(24),
            ]);
            Log::info('Email verification token created', ['user' => $user, 'token' => $token]);

            // Construct the verification URL using the url() helper function
            $verificationUrl = url(route('verification.verify', ['token' => $token], false));

            // Send the verification email
            Mail::to($user->email)->send(new VerifyEmail($verificationUrl));
            Log::info('Verification email sent', ['user' => $user, 'url' => $verificationUrl]);

            // Assign the Super Admin role to the user
            $user->assignRole('Super Admin');
            Log::info('Super Admin role assigned', ['user' => $user]);

            // Commit the transaction
            DB::commit();

            // Redirect to the dashboard with a notification
            return redirect()->route('dashboard')->with('status', 'Please check your email to verify your account.');
        } catch (Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Log the error for debugging
            Log::error('Error during registration', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
            ]);

            // Redirect back with an error message
            return redirect()->route('register')->withErrors(['error' => 'An error occurred during registration. Please try again.']);
        }
    }
}