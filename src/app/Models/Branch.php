<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model {
  protected $guarded = [];
  public function users(){ return $this->hasMany(User::class); }
  public function orders(){ return $this->hasMany(Order::class); }
  public function purchases(){ return $this->hasMany(Purchase::class); }
  public function distributors(){ return $this->hasMany(Distributor::class); }
public function stockLevels(){ return $this->hasMany(StockLevel::class); }
public function ledgerRows(){ return $this->hasMany(StockLedger::class); }
public function stockCounts(){ return $this->hasMany(StockCount::class); }
public function stockAdjustments(){ return $this->hasMany(StockAdjustment::class); }
}
