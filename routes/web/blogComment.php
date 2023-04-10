<?php

use App\Http\Controllers\Backend\BlogCommentController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/blogComment')->controller(BlogCommentController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('blogComment.index');
      Route::get('/show/{blogComment}', 'show')->name('blogComment.show');
      Route::post('/destroy/{blogComment}', 'destroy')->name('blogComment.destroy');
      Route::get('/status/{blogComment}', 'status')->name('blogComment.status');
   });
