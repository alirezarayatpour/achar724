@extends('layouts.app')
@section('css')
@endsection

@section('content')
{{--! Titr --}}
<div class="container-fluid">
   <!-- <div class="container"> -->
      <!-- <div class="row"> -->
         <div class="col-xl-12 position-relative">
            <img src="{{ asset('Frontend/img/sale.jpg') }}" alt="" class="img-fluid sale-banner">
            <h1 class="sale-banner-titr">تخفیفات فروشگاه کیا صنعت</h1>
         </div>
      <!-- </div> -->
   <!-- </div> -->
</div>
{{--! Titr --}}

{{--! Product --}}
<div class="container-fluid mt-3">
   <div class="container">
      <div class="row" style="margin-top: -100px; z-index: 999;">
         <!-- <div class="col-xl-12"> -->
            @foreach ($products as $product)  
               @if ($product->sale)        
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

{{--! Banner --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">

         <div class="col-xl-4 col-12">
            @foreach ($saleBanner as $item)
               @if ($item->position == 'سمت راست')
                  <a href="#">
                     <img src="{{ asset('images/sale-banner').'/'.$item->image }}" alt="" class="w-100 d-block mt-xl-0 mt-lg-0 mt-md-0 mt-2 banner">
                  </a>
               @endif
            @endforeach
         </div>

         <div class="col-xl-8 col-12 mt-xl-0 mt-3">
            @foreach ($saleBanner as $item)
               @if ($item->position == 'سمت چپ')
                  <a href="#">
                     <img src="{{ asset('images/sale-banner').'/'.$item->image }}" alt="" class="w-100 d-block mt-xl-0 mt-lg-0 mt-md-0 mt-2 banner">
                  </a>
               @endif
            @endforeach
         </div>

      </div>
   </div>
</div>
{{--! Banner --}}

{{--! special --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <h2 class="text-end">پیشنهاد ویژه کیا صنعت</h2>
         <div class="col-xl-11 ms-auto me-auto position-relative mt-3">
            <div class="swiper mySwiper">
               <div class="swiper-wrapper">

                  @foreach ($products as $product)  
                     @if ($product->position == 'پیشنهاد ویژه')                       
                        <div class="swiper-slide">
                           <div class="border-special">
                              <a href="{{ route('pages.product', $product->id) }}">
                                 <img src="{{ asset('image/cover').'/'.$product->cover }}" alt=""class="special-image">
                              </a>
                              <p>{{ $product->title }}</p>
                              <div class="d-flex">
                              <div class="w-50 text-end text-muted">امتیاز محصول</div>
                                 <div class="w-50 text-start">
                                 <i class="fa fa-star cheked star-size"></i>
                                 <i class="fa fa-star cheked star-size"></i>
                                 <i class="fa fa-star cheked star-size"></i>
                                 <i class="fa fa-star cheked star-size"></i>
                                 <i class="fa fa-star star-size"></i>
                              </div>
                           </div>
                           <div class="d-flex mt-3">
                              <div class="w-50 text-end text-muted">
                                 @if ($product->storage == 0)
                                    <span class="text-danger">ناموجود</span>
                                 @else
                                 @if ($product->sale)
                                    <span class="price">{{ number_format(($product->price * $product->sale / 100)) }}</span><span class="me-1">تومان</span>
                                 @endif
                                 @if ($product->sale)
                                    <div class="text-muted"><del>{{ number_format($product->price) }}</del></div>
                                 @endif   
                                 @endif   
                              </div>
                              <div class="w-50 text-start">
                                 <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                                    @csrf
                                    <button class="cart-shopping"><i class="fa fa-shopping-cart"></i></button>
                                 </form>
                              </div>
                           </div>
                        </div>
                        </div>
                     @endif              
                  @endforeach

               </div>
            </div>
            <div class="swiper-arrow-next"><i class="fas fa-arrow-left"></i></div>
            <div class="swiper-arrow-previous"><i class="fas fa-arrow-right"></i></div>
         </div>
      </div>
   </div>
</div>    
{{--! special --}}
@endsection

@section('js')
@endsection