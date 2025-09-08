<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockLedger extends Model
{
      protected $table = 'stock_ledger';
  protected $guarded = [];
  public function branch(){ return $this->belongsTo(Branch::class); }
  public function product(){ return $this->belongsTo(Product::class); }
}
