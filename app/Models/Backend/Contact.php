<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
   use HasFactory;

   protected $fillable = [
      'address',
      'phone',
      'mobile',
   ];
}
