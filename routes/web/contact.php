<?php

use App\Http\Controllers\Backend\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/contact')->controller(ContactController::class)
    ->middleware('CheckAdmin')
    ->group(function(){
        Route::get('/', 'index')->name('contact.index');
        Route::get('/create', 'create')->name('contact.create');
        Route::post('/store', 'store')->name('contact.store');
        Route::get('/edit/{contact}', 'edit')->name('contact.edit');
        Route::post('/update/{contact}', 'update')->name('contact.update');
        Route::post('/destroy/{contact}', 'destroy')->name('contact.destroy');
        Route::get('/status/{contact}', 'status')->name('contact.status');
    });
