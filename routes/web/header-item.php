<?php

use App\Http\Controllers\Backend\HeaderItemController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/header-item')->controller(HeaderItemController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('header-item.index');
      Route::get('/create', 'create')->name('header-item.create');
      Route::post('/store', 'store')->name('header-item.store');
      Route::get('/edit/{headerItem}', 'edit')->name('header-item.edit');
      Route::post('/update/{headerItem}', 'update')->name('header-item.update');
      Route::post('/destroy/{headerItem}', 'destroy')->name('header-item.destroy');
      Route::get('/status/{headerItem}', 'status')->name('header-item.status');
});