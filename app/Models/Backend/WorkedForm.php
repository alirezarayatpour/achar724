<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkedForm extends Model
{
   use HasFactory;

   protected $fillable = [
      'name',
      'phone',
      'email',
      'set',
      'price',
      'address',
      'description',
      'image',
   ];
}
