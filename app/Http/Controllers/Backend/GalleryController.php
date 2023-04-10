<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;

class GalleryController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $gallery = Gallery::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.gallery.index', compact('gallery'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.gallery.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreGalleryRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreGalleryRequest $request)
   {
      $imageName = 'gallery' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/gallery', $imageName);

      $gallery = new Gallery([
         'title' => $request->get('title'),
         'description' => $request->get('description'),
         'image' => $imageName,
      ]);

      $gallery->save();
      $message = "محتوا جدید با موفقیت افزوده شد";
      return redirect()->route('gallery.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Gallery  $gallery
    * @return \Illuminate\Http\Response
    */
   public function show(Gallery $gallery)
   {
      return view('admin.pages.gallery.show', compact('gallery'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Gallery  $gallery
    * @return \Illuminate\Http\Response
    */
   public function edit(Gallery $gallery)
   {
      return view('admin.pages.gallery.edit', compact('gallery'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateGalleryRequest  $request
    * @param  \App\Models\Backend\Gallery  $gallery
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateGalleryRequest $request, Gallery $gallery)
   {
      if (file_exists('images/gallery' . $gallery->image)) {
         unlink('images/gallery' . $gallery->image);
      }

      $imageName = 'gallery' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/gallery', $imageName);

      $gallery->title        =   $request->title;
      $gallery->description  =   $request->description;
      $gallery->image        =   $imageName;

      $gallery->save();
      $message = "ویرایش محتوا انجام شد";
      return redirect()->route('gallery.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Gallery  $gallery
    * @return \Illuminate\Http\Response
    */
   public function destroy(Gallery $gallery)
   {
      $gallery->delete();
      $message = "حذف محتوا انجام شد";
      return redirect()->route('gallery.index')->with('success', $message);
   }

   /**
    * @param Gallery $gallery
    */
   public function status(Gallery $gallery)
   {
      if ($gallery->status === 1) {
         $gallery->status = 0;
      } elseif ($gallery->status === 0) {
         $gallery->status = 1;
      }
      $gallery->save();
      return redirect()->back();
   }
}
