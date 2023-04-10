@extends('layouts.app')
@section('css')
@endsection

@section('content')
{{--! Slider --}}
<div class="container-fluid mt-1">
   <div class="container">
      <div class="row">
         <div class="col-xl-12 position-relative">

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
               <div class="carousel-indicators">
                  @foreach($slider as $item)
                     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
                  @endforeach
               </div>
               <div class="carousel-inner">
                  @foreach ($slider as $key=>$item)
                     <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('images/slider').'/'.$item->image }}" class="d-block w-100" alt="...">
                     </div>
                  @endforeach
               </div>
                 <i class="fa fa-arrow-circle-right prevous-icon" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"></i>
                 <i class="fa fa-arrow-circle-left next-icon" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"></i>
             </div>

         </div>
      </div>
   </div>
</div>
{{--! Slider --}}

{{--! Special --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <h2 class="text-center">پیشنهاد ویژه کیا صنعت</h2>
         <div class="col-xl-11 ms-auto me-auto position-relative">
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
{{--! Special --}}

{{--! Category --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <h2 class="text-center">دسته‌بندی محصولات {{ $category->category }}</h2>

         @foreach ($parameters as $item)
         @if($category->id == $item->parent_id)
            <div class="col-xl-3 col-md-4 col-6 mt-3">
               <a href="{{ route('pages.category', $item->id) }}" class="d-block product-category-link">
                  <img src="{{ asset('images/category').'/'.$item->image }}" alt="" class="img-fluid w-100 h-100">
                  <h4 class="product-category-text">{{ $item->category }}</h4>
               </a>
            </div>
         @endif   
         @endforeach
         
      </div>
   </div>
</div>         
{{--! Category --}}

{{--! Beands --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-12 position-relative border-suggest">
            <div class="d-flex align-items-center justify-content-center mt-3">
               <i class="fa fa-handshake fa-2x ms-2 text-red"></i>
               <h2>برندها</h2>
            </div>

            <div class="swiper mySwiper">
               <div class="swiper-wrapper">

                  @foreach ($brand as $item)
                     <div class="swiper-slide">
                        <img src="{{ asset('images/brand').'/'.$item->image }}" alt="" class="d-block mx-auto img-fluid brand-image">
                     </div>
                  @endforeach

               </div>
            </div>

         </div>
      </div>
   </div>
</div>   
{{--! Beands --}}

{{--! Blog --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">

         <div class="d-flex align-items-center justify-content-center position-relative">
            <i class="bi bi-journal-text fa-2x ms-2 text-red"></i>
            <h2>خواندنی‌ها</h2>
            <a href="{{ route('pages.blogs') }}" class="more-blog">
               خواندن مطالب بیشتر
               <i class="fas fa-angle-left me-2"></i>
            </a>
         </div>

         <div class="col-xl-12 position-relative mt-3">
            <div class="swiper mySwiper2">
               <div class="swiper-wrapper">

                  @foreach ($blog as $item)
                  <div class="swiper-slide border-blog">
                        <a href="{{ route('pages.blog', $item->id) }}" class="d-inline">
                           <img src="{{ asset('images/blog').'/'.$item->image }}" alt="" class="d-block mx-auto img-fluid blog-image">
                           <p>{{ $item->title }}</p>
                        </a>
                        <div class="d-flex text-muted px-2">
                        <div class="w-50 text-end">
                           <i class="fa fa-calendar"></i>
                           <span>{!! jdate($item->created_at)->format('%d %B %Y') !!}</span>
                           </div>
                           <div class="w-50 text-start">
                              <i class="fa fa-pen"></i>
                              <span>{{ $item->user->name }}</span>
                           </div>
                        </div>
                     </div>
                     @endforeach

               </div>
            </div>
         </div>

      </div>
   </div>
</div>
{{--! Blog --}}
@endsection

@section('js')
@endsection