<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\WorkedForm;
use Illuminate\Http\Request;

class WorkedFormController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $workedForm = WorkedForm::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.workedForm.index', compact('workedForm'));
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
   public function store(Request $request, WorkedForm $workedForm)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\WorkedForm  $workedForm
    * @return \Illuminate\Http\Response
    */
   public function show(WorkedForm $workedForm)
   {
      return view('admin.pages.workedForm.show', compact('workedForm'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\WorkedForm  $workedForm
    * @return \Illuminate\Http\Response
    */
   public function edit(WorkedForm $workedForm)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Backend\WorkedForm  $workedForm
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, WorkedForm $workedForm)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\WorkedForm  $workedForm
    * @return \Illuminate\Http\Response
    */
   public function destroy(WorkedForm $workedForm)
   {
      $workedForm->delete();
      $message = "دستگاه موفقیت حذف شد";
      return redirect()->route('workedForm.index')->with('success', $message);
   }

   /**
    * @param WorkedForm $workedForm
    */
   public function status(WorkedForm $workedForm)
   {
      if ($workedForm->status === 1) {
         $workedForm->status = 0;
      } elseif ($workedForm->status === 0) {
         $workedForm->status = 1;
      }
      $workedForm->save();
      return redirect()->back();
   }
}
