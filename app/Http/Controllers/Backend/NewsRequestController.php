<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\NewsRequest;
use Illuminate\Http\Request;

class NewsRequestController extends Controller
{
   public function index()
   {
      $newsRequest = NewsRequest::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.newsRequest.index', compact('newsRequest'));
   }
}
