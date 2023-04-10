@extends('layouts.app')
@section('css')
@endsection

@section('content')
{{--! Category --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-6 ms-auto me-auto position-relative">
            <h1 class="best-seller-text"><span>پرفروش‌ها</span></h1>
         </div>
      </div>
   </div>
</div>

<div class="container-fluid mt-3">
   <div class="container">
      <div class="row d-flex justify-content-center">

         @foreach ($categories as $category)
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 mt-2">
               <a href="{{ route('pages.best-seller', $category->id) }}}" class="best-seller-item">
                  <div class="best-seller-box">
                     {{ $category->category }}
                  </div>
               </a>   
            </div>
         @endforeach

      </div>
   </div>
</div>
{{--! Category --}}

{{--! Sort --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <ul class="sort-menu">
               <li>
                  <i class="fa fa-sliders fa-2x ms-2 text-red"></i>
                  <span class="sort-by">مرتب‌سازی براساس :</span>
               </li>
               <li><a href="#" class="active">جدیدترین</a></li>
               <li><a href="#" class="">ارزان‌ترین</a></li>
               <li><a href="#" class="">گران‌ترین</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>         
{{--! Sort --}}

{{--! Product --}}
<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">
         <!-- <div class="col-xl-12"> -->
         @foreach ($products as $product)  
            @if ($product->position == 'پرفروش‌ها')
               <div class="border-best-seller">
                  <a href="{{ route('pages.product', $product->id) }}" class="best-seller-link">
                     <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="special-image img-fluid">
                     <p>{{ $product->title }}</p>
                  </a>
                  <div class="d-flex">
                     @if ($product->storage == 0)
                        <h5 class="text-danger">ناموجود</h5>
                     @else
                     <div class="w-50 text-end">
                        @if ($product->sale)
                           <span class="best-seller-dec"><del>{{ number_format($product->price) }}</del></span>
                        @endif
                     </div>
                     <div class="w-50 text-start">
                        @if ($product->sale)
                           <span class="best-seller-price">{{ number_format(($product->price * $product->sale / 100)) }}</span>
                        @else
                           <span class="best-seller-price">{{ number_format($product->price) }}</span>
                        @endif   
                     </div>
                     @endif
                  </div>
                  <p class="best-seller-dec">{{ $product->title }}</p>
                  <div class="text-start">
                     @php
                     $avg = 0;
                     @endphp
                     @foreach($productComment as $item)
                        @php
                           $avg = $avg + $item->rate;
                           @endphp
                     @endforeach
                     @for($i = 1; $i <= 5; $i++)
                        @if ($i <= $avg && $item->product_id == $product->id)
                           <i class="fa fa-star star-size cheked"></i>
                        @else
                           <i class="fa fa-star star-size"></i>
                        @endif   
                     @endfor
                  </div>
               </div>
            @endif
         @endforeach      
         <!-- </div> -->
      </div>
   </div>
</div>         
{{--! Product --}}
@endsection

@section('js')
@endsection