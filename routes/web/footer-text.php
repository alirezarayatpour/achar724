<?php

use App\Http\Controllers\Backend\FooterTextController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/footer-text')->controller(FooterTextController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('footer-text.index');
      Route::get('/create', 'create')->name('footer-text.create');
      Route::post('/store', 'store')->name('footer-text.store');
      Route::get('/edit/{footerText}', 'edit')->name('footer-text.edit');
      Route::post('/update/{footerText}', 'update')->name('footer-text.update');
      Route::post('/destroy/{footerText}', 'destroy')->name('footer-text.destroy');
      Route::get('/status/{footerText}', 'status')->name('footer-text.status');
});