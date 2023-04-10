<?php

use App\Http\Controllers\Backend\AskCommentController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/askComment')->controller(AskCommentController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('askComment.index');
      Route::post('/reply/{askComment}', 'reply')->name('reply');
      Route::get('/show/{askComment}', 'show')->name('askComment.show');
      Route::post('/destroy/{askComment}', 'destroy')->name('askComment.destroy');
      Route::get('/status/{askComment}', 'status')->name('askComment.status');
   });
