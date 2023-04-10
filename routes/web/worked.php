<?php

use App\Http\Controllers\Backend\WorkedController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/worked')->controller(WorkedController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('worked.index');
      Route::get('/create', 'create')->name('worked.create');
      Route::post('/store', 'store')->name('worked.store');
      Route::get('/show/{worked}', 'show')->name('worked.show');
      Route::get('/edit/{worked}', 'edit')->name('worked.edit');
      Route::post('/update/{worked}', 'update')->name('worked.update');
      Route::post('/destroy/{worked}', 'destroy')->name('worked.destroy');
      Route::get('/status/{worked}', 'status')->name('worked.status');
   });
