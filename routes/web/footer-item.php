<?php

use App\Http\Controllers\Backend\FooterItemController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/footer-item')->controller(FooterItemController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('footer-item.index');
      Route::get('/create', 'create')->name('footer-item.create');
      Route::post('/store', 'store')->name('footer-item.store');
      Route::get('/edit/{footerItem}', 'edit')->name('footer-item.edit');
      Route::post('/update/{footerItem}', 'update')->name('footer-item.update');
      Route::post('/destroy/{footerItem}', 'destroy')->name('footer-item.destroy');
      Route::get('/status/{footerItem}', 'status')->name('footer-item.status');
});