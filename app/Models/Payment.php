<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'debt_id',
        'amount_paid',
        'paid_at',
    ];

    public function debt()
{
    return $this->belongsTo(Debt::class);
}
}
