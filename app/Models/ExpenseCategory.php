<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Get the expenses associated with this category.
     */
    public function expense()
    {
        return $this->hasMany(Expense::class, 'category_id');
    }
      // for the branches 
      public function branch()
      {
          return $this->belongsTo(Branch::class);
      }
      
}

