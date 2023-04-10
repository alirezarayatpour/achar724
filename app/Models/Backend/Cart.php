<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Product;
use App\Models\User;

class Cart extends Model
{
   use HasFactory;

   protected $fillable = [
      'product_id',
      'price',
      'count',
   ];

   public function product()
   {
      return $this->hasOne(Product::class, 'id', 'product_id');
   }

   public function user()
   {
      return $this->hasOne(User::class, 'id', 'user_id');
   }
}
