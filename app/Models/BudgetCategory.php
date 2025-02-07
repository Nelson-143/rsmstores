<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetCategory extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name', 'description'];
    
    public function branch()
      {
          return $this->belongsTo(Branch::class);
      }
      public function expense()
    {
        return $this->hasMany(Budget::class, 'category_id');
    }
}
