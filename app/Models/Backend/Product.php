<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use HasFactory;

   protected $fillable = [
      'title',
      'feature',
      'description',
      'storage',
      'price',
      'sale',
      'weight',
      'capacity',
      'position',
      'brand',
      'cover',
      'category_id',
   ];

   public function images()
   {
      return $this->hasMany(Image::class);
   }

   public function category()
   {
      return $this->belongsTo(Category::class);
   }

   public function product_comment()
   {
      return $this->hasMany(ProductComment::class);
   }

   public function suggest()
   {
      return $this->hasMany(Suggest::class);
   }

}
