<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'name',
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
    public function expenses()
    {
        return $this->hasMany(Expense::class, 'budget_id');
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
