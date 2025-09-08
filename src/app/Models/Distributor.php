<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
     protected $guarded = [];
  public function branch(){ return $this->belongsTo(Branch::class); }
  public function orders(){ return $this->hasMany(Order::class); }
}
