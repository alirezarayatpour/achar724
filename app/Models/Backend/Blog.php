<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   use HasFactory;

   protected $fillable = [
      'title',
      'description',
      'image',
      'position',
      'user_id',
   ];

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function comment()
   {
      return $this->hasMany(BlogComment::class);
   }
}
