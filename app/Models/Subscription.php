<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use App\Scopes\AccountScope;

class Subscription extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uuid',
        'name',
        'price',
        'max_branches',
        'max_users',
        'features',
    ];
    protected $casts = [
        'features' => 'array', // Automatically converts JSON to array
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function userSubscriptions(): HasMany
    {
        return $this->hasMany(UserSubscription::class, 'subscription_id', 'uuid');
    }


}
