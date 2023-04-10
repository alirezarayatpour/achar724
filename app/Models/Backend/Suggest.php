<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
   use HasFactory;

   protected $fillable = [
      'store',
      'price',
      'storage',
      'product_id',
   ];

   public function product()
   {
      return $this->belongsTo(Product::class);
   }
}
