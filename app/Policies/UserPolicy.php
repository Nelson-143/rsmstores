<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewReports(User $user)
    {
        return in_array($user->role->name, ['superadmin', 'admin']);
    }
}
