<?php

namespace app\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Admin extends Authenticatable
{
    use CrudTrait;
    
    protected $guard = 'admin';
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_superadmin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function canAccessDashboard()
{
    return $this->hasRole('admin'); // Or your permission logic
}
}