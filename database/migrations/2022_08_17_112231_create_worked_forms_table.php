<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('worked_forms', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->string('phone');
         $table->string('email')->nullable();
         $table->string('set');
         $table->string('price');
         $table->string('address');
         $table->text('description')->nullable();
         $table->string('image');
         $table->tinyInteger('status')->default(0);
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('worked_forms');
   }
};
