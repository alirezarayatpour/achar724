<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\SaleBanner;
use App\Http\Requests\StoreSaleBannerRequest;
use App\Http\Requests\UpdateSaleBannerRequest;

class SaleBannerController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $saleBanner = SaleBanner::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.sale-banner.index', compact('saleBanner'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.sale-banner.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreSaleBannerRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreSaleBannerRequest $request)
   {
      $imageName = 'sale-banner' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/sale-banner', $imageName);

      $saleBanner = new SaleBanner([
         'image' => $imageName,
         'link'  => $request->get('link'),
         'position' => $request->get('position'),
      ]);

      $saleBanner->save();
      $message = "بنر جدید با موفقیت افزوده شد";
      return redirect()->route('sale-banner.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\SaleBanner  $saleBanner
    * @return \Illuminate\Http\Response
    */
   public function show(SaleBanner $saleBanner)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\SaleBanner  $saleBanner
    * @return \Illuminate\Http\Response
    */
   public function edit(SaleBanner $saleBanner)
   {
      return view('admin.pages.sale-banner.edit', compact('saleBanner'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateSaleBannerRequest  $request
    * @param  \App\Models\Backend\SaleBanner  $saleBanner
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateSaleBannerRequest $request, SaleBanner $saleBanner)
   {
      if (file_exists('images/sale-banner' . $saleBanner->image)) {
         unlink('images/sale-banner' . $saleBanner->image);
      }

      $imageName = 'sale-banner' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/sale-banner', $imageName);

      $saleBanner->image        =   $imageName;
      $saleBanner->link        =   $request->link;
      $saleBanner->position  =   $request->position;

      $saleBanner->save();
      $message = "ویرایش بنر انجام شد";
      return redirect()->route('sale-banner.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\SaleBanner  $saleBanner
    * @return \Illuminate\Http\Response
    */
   public function destroy(SaleBanner $saleBanner)
   {
      $saleBanner->delete();
      $message = "حذف بنر انجام شد";
      return redirect()->route('sale-banner.index')->with('success', $message);
   }

   /**
    * @param SaleBanner $saleBanner
    */
   public function status(SaleBanner $saleBanner)
   {
      if ($saleBanner->status === 1) {
         $saleBanner->status = 0;
      } elseif ($saleBanner->status === 0) {
         $saleBanner->status = 1;
      }
      $saleBanner->save();
      return redirect()->back();
   }
}
