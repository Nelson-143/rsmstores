<?php
namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Scopes\AccountScope;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles; // Add this trait
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'uuid',
        'photo',
        'name',
        'username',
        'email',
        'password',
        'store_name',
        'store_address',
        'store_phone',
        'store_email',
        'is_banned',
        'branch_id',
        'account_id', 
       // Add this field
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'account_id' => 'integer', // Cast account_id to integer
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

    // for the roles manager
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // for the gamification feature
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

    // Add the relationship with the Account model
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function emailVerification()
    {
        return $this->hasOne(EmailVerification::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'notifiable_id')->where('notifiable_type', self::class);
    }

    public function isDeveloper()
    {
        return $this->role === 'developer'; // Adjust based on your role system
    }

}
