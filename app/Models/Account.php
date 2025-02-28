<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }

    public function incomeStatements()
    {
        return $this->hasMany(IncomeStatement::class);
    }

    public function balanceSheets()
    {
        return $this->hasMany(BalanceSheet::class);
    }

    public function cashFlows()
    {
        return $this->hasMany(CashFlow::class);
    }

    public function taxReports()
    {
        return $this->hasMany(TaxReport::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
    public function stockTransfers()
    {
        return $this->hasMany(StockTransfer::class);
    }
  
}
