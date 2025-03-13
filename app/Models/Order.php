<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Scopes\AccountScope;
/**
 * @method static where(string $string, int|string|null $id)
 * @method static whereDate(string $string, string $format)
 * @method static create(array $array)
 */
class Order extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'account_id',
        'customer_id',
        'order_date',
        'order_status',
        'total_products',
        'sub_total',
        'vat',
        'total',
        'invoice_no',
        'payment_type',
        'pay',
        'due',
        "user_id",
        "uuid"
    ];

    protected $casts = [
        'order_date'    => 'date',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
        'order_status'  => OrderStatus::class
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function details(){
        return $this->hasMany(OrderDetails::class);
    }

    public function scopeSearch($query, $value): void
    {
        $query->where('invoice_no', 'like', "%{$value}%")
            ->orWhere('order_status', 'like', "%{$value}%")
            ->orWhere('payment_type', 'like', "%{$value}%");
    }

      // for the branches 
      public function branch()
      {
          return $this->belongsTo(Branch::class);
      }
   

    // Relationship to the OrderItem model
    public function items()
    {
        return $this->hasMany(OrderDetails::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new AccountScope);
    }
 
}
