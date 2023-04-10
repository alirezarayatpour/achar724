<?php

use App\Http\Controllers\Backend\ReplyController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/reply')->controller(ReplyController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/reply/{askComment}', 'index')->name('reply.index');
   });
