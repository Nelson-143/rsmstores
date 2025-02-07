<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role); // Assign role

        return redirect()->route('admin.team.index')->with('success', 'User created successfully.');
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
