<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $question = Question::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.question.index', compact('question'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.question.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreQuestionRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreQuestionRequest $request)
   {
      $question = new Question([
         'question' =>  $request->get('question'),
         'answer' =>  $request->get('answer'),
      ]);

      $question->save();
      $message = "محتوا جدید با موفقیت افزوده شد";
      return redirect()->route('question.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function show(Question $question)
   {
      return view('admin.pages.question.show', compact('question'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function edit(Question $question)
   {
      return view('admin.pages.question.edit', compact('question'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateQuestionRequest  $request
    * @param  \App\Models\Backend\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateQuestionRequest $request, Question $question)
   {
      $question->update($request->all());
      $message = "محتوا جدید با موفقیت ویرایش شد";
      return redirect()->route('question.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Question  $question
    * @return \Illuminate\Http\Response
    */
   public function destroy(Question $question)
   {
      $question->delete();
      $message = "محتوا جدید با موفقیت حذف شد";
      return redirect()->route('question.index')->with('success', $message);
   }

   /**
    * @param Question $question
    */
   public function status(Question $question)
   {
      if ($question->status === 1) {
         $question->status = 0;
      } elseif ($question->status === 0) {
         $question->status = 1;
      }
      $question->save();
      return redirect()->back();
   }
}
