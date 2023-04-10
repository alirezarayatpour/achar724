<?php

use App\Http\Controllers\Backend\SuggestController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/suggest')->controller(SuggestController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('suggest.index');
      // Route::get('/create', 'create')->name('suggest.create');
      Route::post('/store', 'store')->name('suggest.store');
      // Route::get('/edit/{suggest}', 'edit')->name('suggest.edit');
      // Route::post('/update/{suggest}', 'update')->name('suggest.update');
      // Route::post('/destroy/{suggest}', 'destroy')->name('suggest.destroy');
      Route::get('/status/{suggest}', 'status')->name('suggest.status');
   });
