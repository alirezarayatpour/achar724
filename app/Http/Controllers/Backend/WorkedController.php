<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Worked;
use App\Http\Requests\StoreWorkedRequest;
use App\Http\Requests\UpdateWorkedRequest;

class WorkedController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $worked = Worked::query()->get();
      return view('admin.pages.worked.index', compact('worked'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.worked.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreWorkedRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreWorkedRequest $request)
   {
      $worked = new Worked([
         'title' => $request->get('title'),
         'description' => $request->get('description'),
      ]);

      $worked->save();
      $message = "محتوا جدید با موفقیت افزوده شد";
      return redirect()->route('worked.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Worked  $worked
    * @return \Illuminate\Http\Response
    */
   public function show(Worked $worked)
   {
      return view('admin.pages.worked.show', compact('worked'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Worked  $worked
    * @return \Illuminate\Http\Response
    */
   public function edit(Worked $worked)
   {
      return view('admin.pages.worked.edit', compact('worked'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateWorkedRequest  $request
    * @param  \App\Models\Backend\Worked  $worked
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateWorkedRequest $request, Worked $worked)
   {
      $worked->update($request->all());
      $message = "محتوا جدید با موفقیت ویرایش شد";
      return redirect()->route('worked.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Worked  $worked
    * @return \Illuminate\Http\Response
    */
   public function destroy(Worked $worked)
   {
      $worked->delete();
      $message = "محتوا جدید با موفقیت حذف شد";
      return redirect()->route('worked.index')->with('success', $message);
   }

   /**
    * @param Worked $worked
    */
   public function status(Worked $worked)
   {
      if ($worked->status === 1) {
         $worked->status = 0;
      } elseif ($worked->status === 0) {
         $worked->status = 1;
      }
      $worked->save();
      return redirect()->back();
   }
}
