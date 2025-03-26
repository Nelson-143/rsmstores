<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Scopes\AccountScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static insert($category)
 */
class Category extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch(Builder $query, string $search = null)
    {
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('slug', 'like', '%' . $search . '%');
        }
        return $query;
    }

      // for the branches 
      public function branch()
      {
          return $this->belongsTo(Branch::class);
      }

      protected static function booted()
      {
          static::addGlobalScope(new AccountScope);
      }
      
   
}
