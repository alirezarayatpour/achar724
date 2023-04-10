<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskComment extends Model
{
   use HasFactory;

   protected $fillable = [
      'user_id',
      'product_id',
      'comment',
   ];

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function product()
   {
      return $this->belongsTo(Product::class);
   }
}
