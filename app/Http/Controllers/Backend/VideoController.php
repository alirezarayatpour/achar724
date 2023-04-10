<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $video = Video::query()->orderBy('id', 'DESC')->paginate(8);
      return view('admin.pages.video.index', compact('video'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.video.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreVideoRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreVideoRequest $request)
   {
      $videoName = 'video' . '-' . time() . '.' . $request->video->getClientOriginalExtension();
      $request->video->move('videos/video', $videoName);

      $video = new Video([
         'title' => $request->get('title'),
         'description' => $request->get('description'),
         'video' => $videoName,
      ]);

      $video->save();
      $message = "محتوا جدید با موفقیت افزوده شد";
      return redirect()->route('video.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Video  $video
    * @return \Illuminate\Http\Response
    */
   public function show(Video $video)
   {
      return view('admin.pages.video.show', compact('video'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Video  $video
    * @return \Illuminate\Http\Response
    */
   public function edit(Video $video)
   {
      return view('admin.pages.video.edit', compact('video'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateVideoRequest  $request
    * @param  \App\Models\Backend\Video  $video
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateVideoRequest $request, Video $video)
   {
      if (file_exists('videos/video' . $video->video)) {
         unlink('videos/video' . $video->video);
      }

      $videoName = 'video' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('videos/video', $videoName);

      $video->title        =   $request->title;
      $video->description  =   $request->description;
      $video->video        =   $videoName;

      $video->save();
      $message = "ویرایش محتوا انجام شد";
      return redirect()->route('video.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Video  $video
    * @return \Illuminate\Http\Response
    */
   public function destroy(Video $video)
   {
      $video->delete();
      $message = "حذف محتوا انجام شد";
      return redirect()->route('video.index')->with('success', $message);
   }

   /**
    * @param Video $video
    */
   public function status(Video $video)
   {
      if ($video->status === 1) {
         $video->status = 0;
      } elseif ($video->status === 0) {
         $video->status = 1;
      }
      $video->save();
      return redirect()->back();
   }
}
