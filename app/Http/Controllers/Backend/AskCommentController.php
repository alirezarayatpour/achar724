<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AskComment;
use App\Models\Backend\Product;
use Illuminate\Http\Request;

class AskCommentController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $askComment = AskComment::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.askComment.index', compact('askComment'));
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
   public function store(Request $request, Product $product)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\AskComment  $askComment
    * @return \Illuminate\Http\Response
    */
   public function show(AskComment $askComment)
   {
      return view('admin.pages.askComment.show', compact('askComment'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\AskComment  $askComment
    * @return \Illuminate\Http\Response
    */
   public function edit(AskComment $askComment)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Backend\AskComment  $askComment
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, AskComment $askComment)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\AskComment  $askComment
    * @return \Illuminate\Http\Response
    */
   public function destroy(AskComment $askComment)
   {
      $askComment->delete();
      return back();
   }

   public function status(AskComment $askComment)
   {
      if ($askComment->status === 1) {
         $askComment->status = 0;
      } elseif ($askComment->status === 0) {
         $askComment->status = 1;
      }
      $askComment->save();
      return redirect()->back();
   }
}
