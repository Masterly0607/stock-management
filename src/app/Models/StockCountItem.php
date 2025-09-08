<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockCountItem extends Model
{
    protected $guarded = [];
  public function stockCount(){ return $this->belongsTo(StockCount::class); }
  public function product(){ return $this->belongsTo(Product::class); }
}
