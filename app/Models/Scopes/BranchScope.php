<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class BranchScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        // Get the authenticated user
        $user = Auth::user();

       if ($user) {
    if (in_array('Super Admin', $user->roles->pluck('name')->toArray())) {
        // For Super Admin, scope data to only include records created by them or their associated users
        $builder->where('created_by', $user->id);
    } else {
        // For non-Super Admin users, scope data to their branch
        $builder->where('branch_id', $user->branch_id);
    }
}
    }
}