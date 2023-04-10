<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Permissions;
use App\Http\Requests\StorePermissionsRequest;
use App\Http\Requests\UpdatePermissionsRequest;

class PermissionsController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $permission = Permissions::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.permission.index', compact('permission'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.permission.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StorePermissionsRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StorePermissionsRequest $request)
   {
      $imageName = 'permission' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/permission', $imageName);

      $permission = new Permissions([
         'title' => $request->get('title'),
         'description' => $request->get('description'),
         'image' => $imageName,
      ]);

      $permission->save();
      $message = "محتوا جدید با موفقیت افزوده شد";
      return redirect()->route('permission.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Permissions  $permissions
    * @return \Illuminate\Http\Response
    */
   public function show(Permissions $permissions)
   {
      return view('admin.pages.permission.show', compact('permissions'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Permissions  $permissions
    * @return \Illuminate\Http\Response
    */
   public function edit(Permissions $permissions)
   {
      return view('admin.pages.permission.edit', compact('permissions'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdatePermissionsRequest  $request
    * @param  \App\Models\Backend\Permissions  $permissions
    * @return \Illuminate\Http\Response
    */
   public function update(UpdatePermissionsRequest $request, Permissions $permissions)
   {
      if (file_exists('images/permission' . $permissions->image)) {
         unlink('images/permission' . $permissions->image);
      }

      $imageName = 'permission' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/permission', $imageName);

      $permissions->title        =   $request->title;
      $permissions->description  =   $request->description;
      $permissions->image        =   $imageName;

      $permissions->save();
      $message = "ویرایش محتوا انجام شد";
      return redirect()->route('permission.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Permissions  $permissions
    * @return \Illuminate\Http\Response
    */
   public function destroy(Permissions $permissions)
   {
      $permissions->delete();
      $message = "حذف محتوا انجام شد";
      return redirect()->route('permission.index')->with('success', $message);
   }

   /**
    * @param Permissions $permissions
    */
   public function status(Permissions $permissions)
   {
      if ($permissions->status === 1) {
         $permissions->status = 0;
      } elseif ($permissions->status === 0) {
         $permissions->status = 1;
      }
      $permissions->save();
      return redirect()->back();
   }
}
