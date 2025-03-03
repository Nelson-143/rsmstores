<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

   

    // Define the relationship with the User model
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
