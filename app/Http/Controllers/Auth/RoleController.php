<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function assignRole(Request $request, User $user)
    {
        $role = Role::findOrFail($request->role_id);
        $user->roles()->syncWithoutDetaching([$role->id]);
        return response()->json(['message' => 'Role assigned successfully.']);
    }

    public function revokeRole(Request $request, User $user)
    {
        $user->roles()->detach($request->role_id);
        return response()->json(['message' => 'Role revoked successfully.']);
    }

    public function assignPermission(Request $request, Role $role)
    {
        $permission = Permission::findOrFail($request->permission_id);
        $role->permissions()->syncWithoutDetaching([$permission->id]);
        return response()->json(['message' => 'Permission assigned successfully.']);
    }

    public function revokePermission(Request $request, Role $role)
    {
        $role->permissions()->detach($request->permission_id);
        return response()->json(['message' => 'Permission revoked successfully.']);
    }
}