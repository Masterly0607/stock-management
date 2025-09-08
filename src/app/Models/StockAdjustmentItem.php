<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockAdjustmentItem extends Model
{
      protected $guarded = [];
  public function stockAdjustment(){ return $this->belongsTo(StockAdjustment::class); }
  public function product(){ return $this->belongsTo(Product::class); }
}
