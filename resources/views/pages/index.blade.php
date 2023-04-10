@extends('layouts.app')
@section('css')
@endsection

@section('content')
    {{-- ! Slider --}}
    <div class="container-fluid mt-1">
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
    {{-- ! Slider --}}

    {{-- ! Support --}}
    <div class="container-fluid mt-4">
        <div class="container">
            <div class="row ">

               @foreach($service as $item)
                  <div class="col-xl-2 col-md-4 col-6">
                     <div class="text-center support">
                        <div class="support-background"><i class="{{ $item->icon }} support-icon"></i></div>
                        <h5 class="support-text">{{ $item->name }}</h5>
                     </div>
                 </div>
                @endforeach

            </div>
        </div>
    </div>
    {{-- ! Support --}}

    {{-- ! Banner --}}
    <div class="container-fluid mt-4">
        <div class="container">
            <div class="row">

               <div class="col-xl-6 col-md-6">
                  @foreach ($homeBanner as $item)
                     @if ($item->position == 'ردیف اول سمت راست')
                        <a href="#">
                           <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="w-100 d-block mt-xl-0 mt-lg-0 mt-md-0 mt-2 banner">
                        </a>
                     @endif
                  @endforeach
               </div>

               <div class="col-xl-6 col-md-6">
                  @foreach ($homeBanner as $item)
                     @if ($item->position == 'ردیف اول سمت چپ')
                        <a href="#">
                           <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="w-100 d-block mt-xl-0 mt-lg-0 mt-md-0 mt-2 banner">
                     </a>
                     @endif
                  @endforeach
               </div>

            </div>
        </div>
    </div>
    {{-- ! Banner --}}

    {{-- ! Special --}}
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
    {{-- ! Special --}}

    {{-- ! Banner --}}
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
               <div class="col-xl-12 col-12">
                  @foreach ($homeBanner as $item)
                     @if ($item->position == 'ردیف دوم')
                        <a href="#">
                           <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="w-100 d-block mt-xl-0 mt-lg-0 mt-md-0 mt-2 banner">
                        </a>
                     @endif
                  @endforeach
               </div>
            </div>
        </div>
    </div>
    {{-- ! Banner --}}

    {{-- ! Category --}}
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center">دسته‌بندی محصولات کیا صنعت</h2>

               @foreach ($categories as $category)
                  <div class="col-xl-2 col-lg-3 col-md-4 col-6 mt-3 position-relative">
                     <div class="text-center">
                           <img src="{{ asset('images/category').'/'.$category->image }}" alt="" class="d-block mx-auto img-fluid category-image">
                           <div class="category-text">
                              <h5>{{ $category->category }}</h5>
                              <i class="fas fa-angle-down me-2"></i>
                           </div>
                           <div class="category-text-children">
                              <ul>
                                 @foreach ($parameters as $parameter)
                                    @if($category->id == $parameter->parent_id)
                                    <li><a href="{{ route('pages.category', $parameter->id) }}">{{ $parameter->category }}</a></li>
                                    @endif
                                 @endforeach
                              </ul>
                           </div>
                     </div>
                  </div>
               @endforeach

            </div>
        </div>
    </div>
    {{-- ! Category --}}

    {{-- ! Banner --}}
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="row">
                        <div class="col-xl-12">
                           @foreach ($homeBanner as $item)
                              @if ($item->position == 'ردیف سوم سمت راست بالا')
                                 <a href="#"><img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="h-100 d-block mx-auto img-fluid banner"></a>
                              @endif
                           @endforeach
                        </div>
                        <div class="col-xl-12 mt-2">
                           @foreach ($homeBanner as $item)
                              @if ($item->position == 'ردیف سوم سمت راست پایین')
                                 <a href="#"><img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="h-100 d-block mx-auto img-fluid banner"></a>
                              @endif
                           @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 mt-2 mt-xl-0">
                  @foreach ($homeBanner as $item)
                     @if ($item->position == 'ردیف سوم سمت چپ')
                        <a href="#"><img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="h-100 d-block mx-auto img-fluid banner"></a>
                     @endif
                  @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- ! Banner --}}

    {{-- ! Special --}}
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="d-flex">
                <i class="fa fa-tag fa-2x ms-2 text-red"></i>
                <h2>پیشنهاد کیا صنعت</h2>
            </div>

            <div class="border-suggest">
                <div class="row text-center">

                  @foreach ($products as $product)  
                     @if ($product->position == 'پیشنهاد کیاصنعت')      
                     <div class="col-xl-2 col-md-3 col-6 borders">
                        <a href="{{ route('pages.product', $product->id) }}">
                           <img src="{{ asset('image/cover').'/'.$product->cover }}" alt=""class="suggest-image">
                        </a>
                        <p>{{ $product->title }}</p>
                     </div>
                     @endif
                  @endforeach   

                </div>
            </div>

        </div>
    </div>
    {{-- ! Special --}}

    {{-- ! Sale Month --}}
    <div class="container-fluid mt-5">
        <div class="container bgcolor-silver">
            <div class="row">
               <div class="position-relative">
                  <div class="d-flex align-items-center justify-content-center mt-3">
                     <i class="fa fa-fire fa-2x ms-2 text-red"></i>
                     <h2>پرفروش‌های این ماه</h2>
                  </div>
               </div>

               <div class="row">
                  @foreach ($products as $product)  
                     @if ($product->position == 'پرفروش‌ها')
                     <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-3">
                        <a href="{{ route('pages.product', $product->id) }}" class="sale-month-link">
                           <img src="{{ asset('image/cover').'/'.$product->cover }}" alt=""
                              class="img-fluid suggest-image">
                           <p>{{ $product->title }}</p>
                        </a>
                    </div>
                     @endif
                  @endforeach   
               </div>

            </div>
        </div>
    </div>
    {{-- ! Sale Month --}}

    {{-- ! Brands --}}
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
    {{-- ! Brands --}}

    {{-- ! Blog --}}
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
                                        <img src="{{ asset('images/blog') . '/' . $item->image }}" alt="" class="d-block mx-auto img-fluid blog-image">
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
    {{-- ! Blog --}}
@endsection

@section('js')
@endsection
