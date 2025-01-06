<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Customer;
/**
 * @method static where(string $string, int|string|null $id)
 * @method static findOrFail(mixed $customer_id)
 */
class Debt extends Model
{
    public function customer()
{
    return $this->belongsTo(Customer::class, 'customer_id');
}
  // for the branches 
  public function branch()
  {
      return $this->belongsTo(Branch::class);
  }
  



}