@extends('layouts.app')
@section('css')
@endsection

@section('content')
{{--! Titr --}}
<div class="container-fluid">
   <div class="container">
      <div class="row d-flex bg-pink">
         <div class="col-xl-8 col-lg-6 col-md-6 col-12 everything-center">
            <h1 class="gallery-title">گالری تصاویر برگزیده کیا صنعت</h1>
         </div>
         <div class="col-xl-4 col-lg-6 col-md-6 col-12">
            <img src="{{ asset('Frontend/img/camera.png') }}" alt="" class="img-fluid gallery-image">
         </div>
      </div>
   </div>
</div>
{{--! Titr --}}

{{--! Description --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            @foreach ($gallery as $item)
               <h1>{{ $item->title }}</h1>
               <div class="product-description">{!! $item->description !!}</div>
            @endforeach
         </div>
      </div>
   </div>
</div>         
{{--! Description --}}

{{--! Gallery --}}
<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">
         @foreach ($gallery as $item)
            <div class="col-xl-2 col-lg-2 col-md-4 col-6 mt-3">
               <img src="{{ asset('images/gallery').'/'.$item->image }}" alt="" class="img-fluid gallery">
            </div>
         @endforeach   
      </div>
   </div>
</div>

<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">
         <div class="col-xl-9 everything-center">
            <div class="line"></div>
         </div>
         <div class="col-xl-3">
            <a href="" class="text-center more-content">مشاهده مطالب بیشتر</a>
         </div>
      </div>
   </div>
</div>        
{{--! Gallery --}}
@endsection

@section('js')
@endsection