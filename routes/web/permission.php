<?php

use App\Http\Controllers\Backend\PermissionsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/permission')->controller(PermissionsController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('permission.index');
      Route::get('/create', 'create')->name('permission.create');
      Route::post('/store', 'store')->name('permission.store');
      Route::get('/show/{permissions}', 'show')->name('permission.show');
      Route::get('/edit/{permissions}', 'edit')->name('permission.edit');
      Route::post('/update/{permissions}', 'update')->name('permission.update');
      Route::post('/destroy/{permissions}', 'destroy')->name('permission.destroy');
      Route::get('/status/{permissions}', 'status')->name('permission.status');
   });
