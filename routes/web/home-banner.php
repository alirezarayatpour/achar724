<?php

use App\Http\Controllers\Backend\HomeBannerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/home-banner')->controller(HomeBannerController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('home-banner.index');
      Route::get('/create', 'create')->name('home-banner.create');
      Route::post('/store', 'store')->name('home-banner.store');
      Route::get('/edit/{homeBanner}', 'edit')->name('home-banner.edit');
      Route::post('/update/{homeBanner}', 'update')->name('home-banner.update');
      Route::post('/destroy/{homeBanner}', 'destroy')->name('home-banner.destroy');
      Route::get('/status/{homeBanner}', 'status')->name('home-banner.status');
});