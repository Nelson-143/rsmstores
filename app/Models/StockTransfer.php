<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Scopes\AccountScope;
class StockTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 
        'from_location', 
        'to_location', 
        'quantity', 
        'status'
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
      // for the branches 
      public function branch()
      {
          return $this->belongsTo(Branch::class);
      }
      

}
