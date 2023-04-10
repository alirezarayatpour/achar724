<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleBanner extends Model
{
   use HasFactory;

   protected $fillable = [
      'image',
      'link',
      'position',
   ];
}
