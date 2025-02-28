<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\EmailVerification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\VerifyEmail;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']); // Ensure authentication
    }

    /**
     * Display the team management page (list users & manage them).
     */
    public function index()
    {
        $users = User::with('roles')->get(); // Fetch all users with their roles
        $roles = Role::all(); // Fetch all available roles
        return view('admin.team.index', compact('users', 'roles'));
    }

    /**
     * Store or update a user (handles both create & update).
     */
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $request->user_id,
            'password' => $request->user_id ? 'nullable|string|min:6' : 'required|string|min:6',
            'role'     => 'required|exists:roles,name',
        ]);
    
        // If updating an existing user
        if ($request->user_id) {
            $user = User::findOrFail($request->user_id);
            $user->update([
                'name'  => $request->name,
                'email' => $request->email,
            ]);
            if ($request->password) {
                $user->update(['password' => Hash::make($request->password)]);
            }
            $user->syncRoles([$request->role]); // Update role
            return redirect()->route('admin.team.index')->with('success', 'User updated successfully.');
        }
    
        // If creating a new user
        $user = User::create([
            'uuid'      => Str::uuid(),
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);
    
        // Assign the selected role to the user
        $user->assignRole($request->role);
    
        // Generate and store the email verification token
        $token = Str::random(64);
        EmailVerification::create([
            'user_id'    => $user->id,
            'email'      => $user->email,
            'token'     => $token,
            'expires_at' => Carbon::now()->addHours(24),
        ]);
    
        // Send the verification email
        $verificationUrl = route('verification.verify', ['token' => $token]);
        Mail::to($user->email)->send(new VerifyEmail($verificationUrl));
    
        return redirect()->route('admin.team.index')->with('success', 'User created successfully. A verification email has been sent.');
    }

    /**
     * Delete a user.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.team.index')->with('success', 'User deleted successfully.');
    }
}
