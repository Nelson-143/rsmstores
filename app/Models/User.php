<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'uuid',
        'photo',
        'name',
        'username',
        'email',
        'password',
        "store_name",
        "store_address",
        "store_phone",
        "store_email",
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function scopeSearch($query, $value): void
    {
        $query->where('name', 'like', "%{$value}%")
            ->orWhere('email', 'like', "%{$value}%");
    }

    public function getRouteKeyName(): string
    {
        return 'name';
    }

    //for the roles manager
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function hasPermission($permissionName)
    {
        return $this->roles->pluck('permissions')->flatten()->contains('name', $permissionName);
    }

    public function customers(){
        return $this->hasMany(Customer::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
// for the the gamification feature
public function leaderboard()
{
    return $this->hasOne(Leaderboard::class);
}

public function missions()
{
    return $this->hasMany(UserMission::class);
}

public function rewards()
{
    return $this->hasMany(UserReward::class);
}

public function achievements()
{
    return $this->belongsToMany(Achievement::class, 'user_achievements')
                ->withTimestamps();
}

public function getIsAdminAttribute()
{
    return $this->role === 'admin'; // Adjust based on your roles implementation
}

  // for the branches 
  public function branch()
  {
      return $this->belongsTo(Branch::class);
  }
  public function emailVerification()
  {
      return $this->hasOne(EmailVerification::class);
  }
  public function notifications()
  {
      return $this->hasMany(Notification::class, 'notifiable_id')->where('notifiable_type', self::class);
  }
 
}
