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
      Schema::create('suggests', function (Blueprint $table) {
         $table->id();
         $table->string('store');
         $table->string('price');
         $table->string('storage');
         $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
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
      Schema::dropIfExists('suggests');
   }
};
