<?php

namespace App\Models;

use App\Enums\TaxType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\AccountScope;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'slug',
        'code',
        'quantity',
        'buying_price',
        'selling_price',
        'quantity_alert',
        'tax',
        'tax_type',
        'notes',
        'product_image',
        'category_id',
        'unit_id',
        'supplier_id',
        'account_id',
    ];
    public function scopeSearch(Builder $query, string $search = null)
    {
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('slug', 'like', '%' . $search . '%');
        }
        return $query;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details(){
        return $this->hasMany(OrderDetails::class);
    }

    public function stockTransfers()
    {
        return $this->hasMany(StockTransfer::class);
    }

    public function damagedProducts()
    {
        return $this->hasMany(DamagedProduct::class);
    }

      // for the branches 
      public function branch()
      {
          return $this->belongsTo(Branch::class);
      }
      
      public function product()
      {
          return $this->belongsTo(Product::class);
      }

      protected static function booted()
      {
          static::addGlobalScope(new AccountScope);
      }

      public function account()
{
    return $this->belongsTo(Account::class, 'account_id');
}
}
