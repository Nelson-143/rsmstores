<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\VerifyEmail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EmailVerificationController extends Controller
{
    /**
     * Show the email verification form.
     */
    public function showVerificationForm()
    {
        return view('auth.emails.verify-email');
    }

    /**
     * Handle the email verification token generation and email sending.
     */
    public function sendVerification(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        // Throttle email verification requests to prevent abuse.
        $recentVerification = EmailVerification::where('user_id', $user->id)
            ->where('created_at', '>=', Carbon::now()->subMinutes(5))
            ->exists();

        if ($recentVerification) {
            return $this->handleResponse(
                $request,
                'You can only request a verification email once every 5 minutes.',
                429
            );
        }

        $token = $this->generateVerificationToken($user);

        Mail::to($user->email)->send(new VerifyEmail($token));

        return $this->handleResponse(
            $request,
            'Verification email sent successfully.',
            200
        );
    }

    /**
     * Verify the email using the provided token.
     */
    public function verify($token)
    {
        $verification = EmailVerification::where('token', $token)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$verification) {
            return $this->handleResponse(
                request(),
                'Invalid or expired verification token.',
                400,
                'login'
            );
        }

        $user = User::find($verification->user_id);
        $user->update(['email_verified_at' => Carbon::now()]);

        $verification->delete();

        return $this->handleResponse(
            request(),
            'Email verified successfully!',
            200,
            'auth.onboarding'
        );
    }

    /**
     * Resend the verification email.
     */
    public function resendVerification(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)
            ->whereNull('email_verified_at')
            ->first();

        if (!$user) {
            return $this->handleResponse(
                $request,
                'Email already verified or user not found.',
                400
            );
        }

        return $this->sendVerification($request);
    }

    /**
     * Generate a new email verification token.
     */
    private function generateVerificationToken(User $user): string
    {
        $token = Str::random(64);

        EmailVerification::updateOrCreate(
            ['user_id' => $user->id],
            [
                'email' => $user->email,
                'token' => $token,
                'expires_at' => Carbon::now()->addHours(24),
            ]
        );

        return $token;
    }

    /**
     * Handle both JSON and web responses.
     */
    private function handleResponse(Request $request, string $message, int $status, string $redirectRoute = null)
    {
        if ($request->wantsJson()) {
            return response()->json(['message' => $message], $status);
        }

        if ($status >= 400) {
            return back()->withErrors($message);
        }

        return redirect()->route($redirectRoute ?: 'verification.notice')->with('status', $message);
    }
}
