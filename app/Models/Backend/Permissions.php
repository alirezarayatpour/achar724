<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
   use HasFactory;

   protected $fillable = [
      'title',
      'description',
      'image',
   ];
}
