<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;


use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\EmailVerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamLogsController;
Route::middleware('guest')->group(function () {
    // Registration routes
    Route::get('register', [RegisteredUserController::class, 'create'])->middleware('doNotCacheResponse')->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->middleware('doNotCacheResponse');

    // Login routes
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->middleware('doNotCacheResponse')->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->middleware('doNotCacheResponse');

    // Forgot password routes
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->middleware('doNotCacheResponse')->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->middleware('doNotCacheResponse')->name('password.email');

    // Reset password routes
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->middleware('doNotCacheResponse')->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->middleware('doNotCacheResponse')->name('password.store');
});

// Email verification routes
Route::middleware('auth')->group(function () {
    Route::get('email/verify', [EmailVerificationController::class, 'showVerificationForm'])->middleware('doNotCacheResponse')
        ->name('verification.notice');
    Route::post('email/verification-notification', [EmailVerificationController::class, 'resendVerification'])->middleware('doNotCacheResponse')
        ->name('verification.send');

    Route::post('email/verification/resend', [EmailVerificationController::class, 'resendVerification'])->middleware('doNotCacheResponse')
        ->name('verification.resend');
        Route::post('/send-verification', [EmailVerificationController::class, 'sendVerification'])->middleware('doNotCacheResponse');
});
Route::get('email/verify/{token}', [EmailVerificationController::class, 'verify'])->middleware('doNotCacheResponse')->name('verification.verify');


// Onboarding route (accessible only after registration)
Route::middleware('auth')->get('onboarding', function () {
    return view('auth.onboarding');
})->name('auth.onboarding');
Route::middleware('auth')->group(function () {
  



    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->middleware('doNotCacheResponse')
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store'])->middleware('doNotCacheResponse');

    Route::put('password', [PasswordController::class, 'update'])->name('password.update')->middleware('doNotCacheResponse');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('doNotCacheResponse')
        ->name('logout');
});



Route::middleware(['auth',])->group(function () {
    Route::get('/team', [TeamController::class, 'index'])->name('admin.team.index');
    Route::post('/team/storeOrUpdate', [TeamController::class, 'storeOrUpdate'])->name('admin.team.storeOrUpdate');
    Route::delete('/team/{user}', [TeamController::class, 'destroy'])->name('admin.team.destroy');


    Route::get('/TeamLogs', [TeamLogsController::class, 'showTeamLogs'])->name('admin.team.logs.show');    
});

/*
Route::group(['middleware' => ['role:SuperAdmin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
});
*/


