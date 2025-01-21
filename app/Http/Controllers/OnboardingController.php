<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function showOnboarding()
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('auth.onboarding'); // Point to your onboarding Blade view
    }
}
