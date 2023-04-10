<?php

use App\Http\Controllers\Backend\VideoController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/video')->controller(VideoController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('video.index');
      Route::get('/create', 'create')->name('video.create');
      Route::post('/store', 'store')->name('video.store');
      Route::get('/show/{video}', 'show')->name('video.show');
      Route::get('/edit/{video}', 'edit')->name('video.edit');
      Route::post('/update/{video}', 'update')->name('video.update');
      Route::post('/destroy/{video}', 'destroy')->name('video.destroy');
      Route::get('/status/{video}', 'status')->name('video.status');
   });
