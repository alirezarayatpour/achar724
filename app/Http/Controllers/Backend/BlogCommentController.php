<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Blog;
use App\Models\Backend\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $blogComment = BlogComment::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.blogComment.index', compact('blogComment'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request, Blog $blog)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\BlogComment  $blogComment
    * @return \Illuminate\Http\Response
    */
   public function show(BlogComment $blogComment)
   {
      return view('admin.pages.blogComment.show', compact('blogComment'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\BlogComment  $blogComment
    * @return \Illuminate\Http\Response
    */
   public function edit(BlogComment $blogComment)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Backend\BlogComment  $blogComment
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, BlogComment $blogComment)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\BlogComment  $blogComment
    * @return \Illuminate\Http\Response
    */
   public function destroy(BlogComment $blogComment)
   {
      $blogComment->delete();
      return back();
   }

   public function status(BlogComment $blogComment)
   {
      if ($blogComment->status === 1) {
         $blogComment->status = 0;
      } elseif ($blogComment->status === 0) {
         $blogComment->status = 1;
      }
      $blogComment->save();
      return redirect()->back();
   }
}
