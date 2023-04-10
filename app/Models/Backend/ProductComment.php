<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
   use HasFactory;

   protected $fillable = [
      'name',
      'email',
      'comment',
      'product_id',
      'rate',
   ];

   public function product()
   {
      return $this->belongsTo(Product::class);
   }
}
