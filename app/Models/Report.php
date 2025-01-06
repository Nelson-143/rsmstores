<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'data', 'file_path'];

    protected $casts = [
        'data' => 'array', // Automatically cast JSON data
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

      // for the branches 
      public function branch()
      {
          return $this->belongsTo(Branch::class);
      }
      
}
