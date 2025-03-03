<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\AccountScope;

class Budget extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id', // ✅ Make sure this is here!
        'amount',
        'start_date',
        'end_date',
    ];
    
  
    
    /**
     * Get the user associated with the budget.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the expenses associated with this budget.
     */
    public function expense()
    {
        return $this->hasMany(Expense::class, 'budget_id');
    }
    // In Budget.php model
public function category()
{
    return $this->belongsTo(BudgetCategory::class, 'category_id');
}

    /**
     * Calculate the remaining budget.
     *
     * @return float
     */
    public function remainingBudget()
    {
        $totalExpenses = $this->expenses()->sum('amount');
        return $this->amount - $totalExpenses;
    }
    
    
}
