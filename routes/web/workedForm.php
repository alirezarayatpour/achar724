<?php

use App\Http\Controllers\Backend\workedFormController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/workedForm')->controller(workedFormController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('workedForm.index');
      Route::get('/show/{workedForm}', 'show')->name('workedForm.show');
      Route::post('/destroy/{workedForm}', 'destroy')->name('workedForm.destroy');
      Route::get('/status/{workedForm}', 'status')->name('workedForm.status');
   });
