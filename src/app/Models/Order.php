<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $guarded = [];
  public function branch(){ return $this->belongsTo(Branch::class); }
  public function distributor(){ return $this->belongsTo(Distributor::class); }
  public function items(){ return $this->hasMany(OrderItem::class); }
}
