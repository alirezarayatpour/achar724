<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
   use HasFactory;

   protected $fillable = [
      'icon',
      'link',
   ];
}
