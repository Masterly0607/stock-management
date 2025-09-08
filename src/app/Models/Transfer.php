<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
     protected $guarded = [];
  public function fromBranch(){ return $this->belongsTo(Branch::class, 'from_branch_id'); }
  public function toBranch(){ return $this->belongsTo(Branch::class, 'to_branch_id'); }
  public function items(){ return $this->hasMany(TransferItem::class); }
}
