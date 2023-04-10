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
      Schema::create('products', function (Blueprint $table) {
         $table->id();
         $table->string('title');
         $table->string('feature');
         $table->text('description');
         $table->integer('storage');
         $table->string('price');
         $table->integer('sale')->nullable();
         $table->string('weight');
         $table->string('capacity');
         $table->string('position');
         $table->string('brand');
         $table->string('cover');
         $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
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
      Schema::dropIfExists('products');
   }
};
