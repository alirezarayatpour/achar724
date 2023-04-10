<?php

use App\Http\Controllers\Backend\SaleBannerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/sale-banner')->controller(SaleBannerController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('sale-banner.index');
      Route::get('/create', 'create')->name('sale-banner.create');
      Route::post('/store', 'store')->name('sale-banner.store');
      Route::get('/edit/{saleBanner}', 'edit')->name('sale-banner.edit');
      Route::post('/update/{saleBanner}', 'update')->name('sale-banner.update');
      Route::post('/destroy/{saleBanner}', 'destroy')->name('sale-banner.destroy');
      Route::get('/status/{saleBanner}', 'status')->name('sale-banner.status');
});