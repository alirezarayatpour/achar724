<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\logo;
use App\Http\Requests\StorelogoRequest;
use App\Http\Requests\UpdatelogoRequest;

class LogoController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $logo = Logo::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.logo.index', compact('logo'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.logo.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StorelogoRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StorelogoRequest $request)
   {
      $imageName = 'logo' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/logo', $imageName);

      $logo = new logo([
         'image' => $imageName,
         'position' => $request->get('position'),
      ]);

      $logo->save();
      $message = "لوگو با موفقیت افزوده شد";
      return redirect()->route('logo.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\logo  $logo
    * @return \Illuminate\Http\Response
    */
   public function show(logo $logo)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\logo  $logo
    * @return \Illuminate\Http\Response
    */
   public function edit(logo $logo)
   {
      return view('admin.pages.logo.edit', compact('logo'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdatelogoRequest  $request
    * @param  \App\Models\Backend\logo  $logo
    * @return \Illuminate\Http\Response
    */
   public function update(UpdatelogoRequest $request, logo $logo)
   {
      if (file_exists('images/logo' . $logo->image)) {
         unlink('images/logo' . $logo->image);
      }

      $imageName = 'logo' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/logo', $imageName);

      $logo->image        =   $imageName;
      $logo->position  =   $request->position;

      $logo->save();
      $message = "ویرایش لوگو انجام شد";
      return redirect()->route('logo.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\logo  $logo
    * @return \Illuminate\Http\Response
    */
   public function destroy(logo $logo)
   {
      $logo->delete();
      $message = "حذف لوگو انجام شد";
      return redirect()->route('logo.index')->with('success', $message);
   }

   /**
    * @param logo $logo
    */
   public function status(logo $logo)
   {
      if ($logo->status === 1) {
         $logo->status = 0;
      } elseif ($logo->status === 0) {
         $logo->status = 1;
      }
      $logo->save();
      return redirect()->back();
   }
}
