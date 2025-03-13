<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\AccountScope;

class BalanceSheet extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'assets',
        'liabilities',
        'equity',
    ];

    protected $casts = [
        'assets' => 'array',
        'liabilities' => 'array',
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
