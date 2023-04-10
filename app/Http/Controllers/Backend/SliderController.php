<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $slider = Slider::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.slider.index', compact('slider'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.slider.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreSliderRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreSliderRequest $request)
   {
      $imageName = 'slider'.'-'.time().$request->image->getClientOriginalExtension();
      $request->image->move('images/slider', $imageName);

      $slider = new Slider([
         'image' => $imageName,
         'link' => $request->get('link'),
         'position' => $request->get('position'),
      ]);

      $slider->save();
      $message = "اسلایدر جدید با موفقیت افزوده شد";
      return redirect()->route('slider.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Slider  $slider
    * @return \Illuminate\Http\Response
    */
   public function show(Slider $slider)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Slider  $slider
    * @return \Illuminate\Http\Response
    */
   public function edit(Slider $slider)
   {
      return view('admin.pages.slider.edit', compact('slider'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateSliderRequest  $request
    * @param  \App\Models\Backend\Slider  $slider
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateSliderRequest $request, Slider $slider)
   {
      if(file_exists('images/slider'.$slider->image)){
         unlink('images/slider'.$slider->image);
      }

      $imageName = 'slider'.'-'.time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move('images/slider', $imageName);
      
      $slider->image        =   $imageName;
      $slider->link        =   $request->link;
      $slider->position  =   $request->position;

      $slider->save();
      $message = "ویرایش اسلایدر انجام شد";
      return redirect()->route('slider.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Slider  $slider
    * @return \Illuminate\Http\Response
    */
   public function destroy(Slider $slider)
   {
      $slider->delete();
      $message = "حذف اسلایدر انجام شد";
      return redirect()->route('slider.index')->with('success', $message);
   }

   /**
     * @param Slider $slider
   */
  public function status(Slider $slider)
  {
     if($slider->status === 1){
        $slider->status = 0;
     } elseif($slider->status === 0){
        $slider->status = 1;
     }
     $slider->save();
     return redirect()->back();
  }
}
