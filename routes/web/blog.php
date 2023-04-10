<?php

use App\Http\Controllers\Backend\BlogController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/blog')->controller(BlogController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('blog.index');
      Route::get('/create', 'create')->name('blog.create');
      Route::post('/store', 'store')->name('blog.store');
      Route::get('/show/{blog}', 'show')->name('blog.show');
      Route::get('/edit/{blog}', 'edit')->name('blog.edit');
      Route::post('/update/{blog}', 'update')->name('blog.update');
      Route::post('/destroy/{blog}', 'destroy')->name('blog.destroy');
      Route::get('/status/{blog}', 'status')->name('blog.status');
});