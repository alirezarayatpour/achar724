<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\HomeBanner;
use App\Http\Requests\StoreHomeBannerRequest;
use App\Http\Requests\UpdateHomeBannerRequest;

class HomeBannerController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $homeBanner = HomeBanner::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.home-banner.index', compact('homeBanner'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.home-banner.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreHomeBannerRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreHomeBannerRequest $request)
   {
      $imageName = 'home-banner'.'-'.time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move('images/home-banner', $imageName);

      $homeBanner = new HomeBanner([
         'image' => $imageName,
         'link'  => $request->get('link'),
         'position' => $request->get('position'),
      ]);

      $homeBanner->save();
      $message = "بنر جدید با موفقیت افزوده شد";
      return redirect()->route('home-banner.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\HomeBanner  $homeBanner
    * @return \Illuminate\Http\Response
    */
   public function show(HomeBanner $homeBanner)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\HomeBanner  $homeBanner
    * @return \Illuminate\Http\Response
    */
   public function edit(HomeBanner $homeBanner)
   {
      return view('admin.pages.home-banner.edit', compact('homeBanner'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateHomeBannerRequest  $request
    * @param  \App\Models\Backend\HomeBanner  $homeBanner
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateHomeBannerRequest $request, HomeBanner $homeBanner)
   {
      if(file_exists('images/home-banner'.$homeBanner->image)){
         unlink('images/home-banner'.$homeBanner->image);
      }

      $imageName = 'home-banner'.'-'.time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move('images/home-banner', $imageName);
      
      $homeBanner->image        =   $imageName;
      $homeBanner->link        =   $request->link;
      $homeBanner->position  =   $request->position;

      $homeBanner->save();
      $message = "ویرایش بنر انجام شد";
      return redirect()->route('home-banner.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\HomeBanner  $homeBanner
    * @return \Illuminate\Http\Response
    */
   public function destroy(HomeBanner $homeBanner)
   {
      $homeBanner->delete();
      $message = "حذف بنر انجام شد";
      return redirect()->route('home-banner.index')->with('success', $message);
   }

   /**
    * @param HomeBanner $homeBanner
    */
   public function status(HomeBanner $homeBanner)
   {
      if ($homeBanner->status === 1) {
         $homeBanner->status = 0;
      } elseif ($homeBanner->status === 0) {
         $homeBanner->status = 1;
      }
      $homeBanner->save();
      return redirect()->back();
   }
}
