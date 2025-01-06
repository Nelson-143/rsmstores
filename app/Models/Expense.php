<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'amount',
        'description',
        'expense_date',
        'attachment',
    ];

    /**
     * Get the category associated with the expense.
     */
    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'category_id');
    }

    /**
     * Get the user associated with the expense.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

      // for the branches 
      public function branch()
      {
          return $this->belongsTo(Branch::class);
      }
      
}

