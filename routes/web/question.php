<?php

use App\Http\Controllers\Backend\QuestionController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/question')->controller(QuestionController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('question.index');
      Route::get('/create', 'create')->name('question.create');
      Route::post('/store', 'store')->name('question.store');
      Route::get('/show/{question}', 'show')->name('question.show');
      Route::get('/edit/{question}', 'edit')->name('question.edit');
      Route::post('/update/{question}', 'update')->name('question.update');
      Route::post('/destroy/{question}', 'destroy')->name('question.destroy');
      Route::get('/status/{question}', 'status')->name('question.status');
   });
