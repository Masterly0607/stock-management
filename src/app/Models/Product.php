<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  protected $guarded = [];
  public function category(){ return $this->belongsTo(Category::class); }
  public function images(){ return $this->hasMany(ProductImage::class); }
  public function orderItems(){ return $this->hasMany(OrderItem::class); }
public function purchaseItems(){ return $this->hasMany(PurchaseItem::class); }
public function transferItems(){ return $this->hasMany(TransferItem::class); }
public function ledgerRows(){ return $this->hasMany(StockLedger::class); }
}
