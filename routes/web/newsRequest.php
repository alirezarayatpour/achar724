<?php

use App\Http\Controllers\Backend\NewsRequestController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/newsRequest')->controller(NewsRequestController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('newsRequest.index');
   });