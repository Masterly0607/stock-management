<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockCount extends Model
{
     protected $guarded = [];
  public function branch(){ return $this->belongsTo(Branch::class); }
  public function items(){ return $this->hasMany(StockCountItem::class); }
}
