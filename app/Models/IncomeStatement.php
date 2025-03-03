<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\AccountScope;

class IncomeStatement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'revenue', 'cogs', 'gross_profit', 'operating_expenses', 'net_income'];

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
