<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;


use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamLogsController;
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
  



    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});



Route::middleware(['auth',])->group(function () {
    Route::get('/admin/team', [TeamController::class, 'index'])->name('admin.team.index');
    Route::get('/admin/team/create', [TeamController::class, 'create'])->name('admin.team.create');
    Route::post('/admin/team', [TeamController::class, 'store'])->name('admin.team.store');


    Route::get('/admin/team/Logs', [TeamLogsController::class, 'showTeamLogs'])->name('admin.team.logs.show');    
    Route::put('/admin/team/{user}', [TeamController::class, 'update'])->name('admin.team.update');
    Route::post('/admin/team/assign-role/{user}', [RoleController::class, 'assignRole'])->name('admin.team.assignRole');
    Route::post('/admin/team/revoke-role/{user}', [RoleController::class, 'revokeRole'])->name('admin.team.revokeRole');
    Route::post('/admin/team/assign-permission/{role}', [RoleController::class, 'assignPermission'])->name('admin.team.assignPermission');
    Route::post('/admin/team/revoke-permission/{role}', [RoleController::class, 'revokePermission'])->name('admin.team.revokePermission');
});

/*
Route::group(['middleware' => ['role:SuperAdmin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
});
*/


