<?php

use App\Http\Controllers\Backend\FooterColumnController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/footer-column')->controller(FooterColumnController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('footer-column.index');
      Route::get('/create', 'create')->name('footer-column.create');
      Route::post('/store', 'store')->name('footer-column.store');
      Route::get('/edit/{footerColumn}', 'edit')->name('footer-column.edit');
      Route::post('/update/{footerColumn}', 'update')->name('footer-column.update');
      Route::post('/destroy/{footerColumn}', 'destroy')->name('footer-column.destroy');
      Route::get('/status/{footerColumn}', 'status')->name('footer-column.status');
});