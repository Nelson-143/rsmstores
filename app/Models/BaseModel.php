<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class BaseModel extends Model
{
   protected static function boot()
{
    parent::boot();

    // Apply the global scope to filter by account_id
    static::addGlobalScope('account', function (Builder $builder) {
        if (Auth::check() && !Auth::user()->hasRole('system_admin')) {
            $builder->where('account_id', Auth::user()->account_id);
        }
    });
}
}
