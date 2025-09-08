<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];
  public function branch(){ return $this->belongsTo(Branch::class); }
  public function supplier(){ return $this->belongsTo(Supplier::class); }
  public function items(){ return $this->hasMany(PurchaseItem::class); }
}
