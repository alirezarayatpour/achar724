<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AskComment;
use App\Models\Backend\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(AskComment $askComment)
   {
      return view('admin.pages.reply.reply', compact('askComment'));
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
   public function store(Request $request, Reply $reply, AskComment $askComment)
   {
      $reply = new Reply([
         'user_id' => auth()->user()->id,
         'comment_id' => $askComment->id,
         'reply' => $request->get('reply'),
      ]);

      $reply->save();
      return redirect()->route('askComment.index');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Reply  $reply
    * @return \Illuminate\Http\Response
    */
   public function show(Reply $reply)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Reply  $reply
    * @return \Illuminate\Http\Response
    */
   public function edit(Reply $reply)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Backend\Reply  $reply
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Reply $reply)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Reply  $reply
    * @return \Illuminate\Http\Response
    */
   public function destroy(Reply $reply)
   {
      //
   }
}
