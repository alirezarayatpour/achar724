<?php

use App\Http\Controllers\Backend\GalleryController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/gallery')->controller(GalleryController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('gallery.index');
      Route::get('/create', 'create')->name('gallery.create');
      Route::post('/store', 'store')->name('gallery.store');
      Route::get('/show/{gallery}', 'show')->name('gallery.show');
      Route::get('/edit/{gallery}', 'edit')->name('gallery.edit');
      Route::post('/update/{gallery}', 'update')->name('gallery.update');
      Route::post('/destroy/{gallery}', 'destroy')->name('gallery.destroy');
      Route::get('/status/{gallery}', 'status')->name('gallery.status');
   });
