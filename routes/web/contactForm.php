<?php

use App\Http\Controllers\Backend\ContactFormController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/contactForm')->controller(ContactFormController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('contactForm.index');
      Route::post('/store', 'store')->name('contactForm.store');
      Route::get('/show/{contactForm}', 'show')->name('contactForm.show');
   });
