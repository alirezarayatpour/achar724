@extends('layouts.app')
@section('css')
@endsection

@section('content')
{{--! Product --}}
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-12">
         <h5 class="product-titr">
            فروشگاه کیا صنعت پدیده فرزان، اولین مرجع خرید و فروش تجهیزات تعمیرگاهی نو و دست دوم در ایران  
         </h5>
      </div>
   </div>
</div>     

<!--! Links -->
<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <ul class="follow-link">
               <li><a href="{{ route('pages.index') }}" class="follow-link-item">کیا صنعت / </a></li>
               <li><a href="#" class="follow-link-item">محصولات / </a></li>
               @foreach ($category as $item)
                  @if ($item->id == $product->category->parent_id)
                     <li><a href="{{ route('pages.all-category', $item->id) }}" class="follow-link-item">
                        {{ $item->category }} /
                     </a></li>
                  @endif
               @endforeach
               <li><a href="{{ route('pages.category', $product->category->id) }}" class="follow-link-item">
                  {{ $product->category->category }} /
               </a></li>
               <li><a href="javascript:void(0)" class="follow-link-item active">{{ $product->title }}</a></li>
            </ul>
         </div>
      </div>
   </div>
</div> 
<!--! Links -->

<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">

         <div class="col-xl-1 col-lg-1 col-1 order-lg-1 order-xl-0 order-1">
            <form action="{{ route('add-to-favorite', $product->id) }}" method="POST">
               @csrf
               <button class="no-button-style-heart">
                  <i class="bi bi-heart product-icon"></i>
               </button>
            </form>
            <i class="bi bi-share product-icon"></i>
            <i class="bi bi-graph-up product-icon"></i>
            <i class="bi bi-arrow-left-right product-icon"></i>
         </div>

         <div class="col-xl-5 col-lg-5 col-11 order-lg-1 order-xl-1 order-2">
            <h1>{{ $product->title }}</h1>
            <h4 class="text-muted">{{ $product->feature }}</h4>
            <div class="product-description">{!! $product->description !!}</div>
            @if($product->storage == 0)
               <div class="product-price">ناموجود</div>
            @endif
            @if ($product->sale)
               <div class="product-price">{{ number_format(($product->price * $product->sale / 100)) }} تومان</div>
            @else
               <div class="product-price">{{ number_format($product->price) }} تومان</div>
            @endif   
            <form action="{{ route('add-to-cart', $product->id) }}" method="POST" class="w-100">
               @csrf
               <div class="row">
                  <div class="col-xl-6 col-6">
                     <div class="coloring-box">
                        <label for="color" class="coloring-label">رنگ‌بندی</label>
                        <input type="checkbox" name="color" id="color" class="coloring">
                        <input type="checkbox" name="color" id="color" class="coloring">
                     </div>
                  </div>
                  <div class="col-xl-6 col-6">
                     <div class="coloring-box">
                        <label for="number" class="coloring-label">تعداد</label>
                        <select name="number" id="number" class="numbering">
                           <option disabled selected>تعداد مورد نظر را انتخاب کنید</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                        </select>
                     </div>
                  </div>
               </div>
               @if ($product->storage)
                  <button class="add-to-cart">افزودن به سبد خرید</button>
               @else
                  <h5 class="text-center">لطفا تماس بگیرید</h5>   
               @endif
            </form>
         </div>

         <!--  -->
         <div class="col-xl-6 col-lg-6 order-lg-2 order-xl-2 order-0 mb-xl-0 mb-lg-0 mb-5">

            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
               class="swiper mySwiper4" >
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="img-fluid product-gallery"/>
                  </div>
                  @foreach($images as $image)
                     @if($product->id == $image->product_id)
                        <div class="swiper-slide">
                           <img src="{{ asset('image/images').'/'.$image->image }}" alt="" class="img-fluid product-gallery"/>
                        </div>
                     @endif
                  @endforeach
               </div>
                  <div class="swiper-button-next text-muted"></div>
                  <div class="swiper-button-prev text-muted"></div>
            </div>

            <div thumbsSlider="" class="swiper mySwiper3">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="img-fluid product-gallery-loop"/>
                  </div>
                  @foreach($images as $image)
                     @if($product->id == $image->product_id)
                        <div class="swiper-slide">
                           <img src="{{ asset('image/images').'/'.$image->image }}" alt="" class="img-fluid product-gallery-loop"/>
                        </div>
                     @endif
                  @endforeach
               </div>
            </div>
         </div>
         <!--!  -->

      </div>
   </div>
</div>     

{{--! Price --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <table class="table table-striped text-center align-middle mt-3">
               @foreach ($suggest as $item)
                  @if($product->id == $item->product_id)
                     <tr>
                        <td>{{ $item->store }}</td>
                        <form action="{{ route('add-to-cart', $item->id) }}" method="POST">
                           @csrf
                           <td>{{ number_format($item->price) }} تومان</td>
                           <td>
                              <button class="btn btn-danger">افزودن به سبد خرید</button>
                           </td>
                        </form>
                     </tr>
                  @endif   
               @endforeach
            </table>
         </div>
      </div>
   </div>
</div>            
{{--! Price --}}

<div class="container-fluid mt-3">
   <div class="container">
      <div class="row py-2 justify-content-center border-suggest">
         @foreach ($service as $item)
            <div class="col-xl-2 col-lg-3 col-md-4 col-6 everything-center">
               <div class="product-support">
                  <div><i class="{{ $item->icon }} ms-3 support-icon"></i></div>
                  <div><h5 class="support-text">{{ $item->name }}</h5></div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
</div>         

<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <ul class="tab-product bgcolor-silver">
               <button class="tab-product-item tab-product-item-active">معرفی محصول</button>
               <button class="tab-product-item">مشخصات محصول</button>
               <button class="tab-product-item">نقد و نظرات</button>
               <button class="tab-product-item">پرسش و پاسخ</button>
            </ul>
         </div>
      </div>
   </div>
</div>       

<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <!-- معرفی محصول -->
            <div class="content-box" style="display: block;">{!! $product->description !!}</div>

            <!-- مشخصات محصول -->
            <div class="content-box" style="display: none;">
               <div>
                  <span>وزن :</span>
                  <span>{{ $product->weight }} کیلوگرم</span>
              </div>
              <hr/>
              <div>
                  <span>حداکثر ظرفیت :</span>
                  <span>{{ $product->capacity }} کیلوگرم</span>
              </div>
            </div>

            <!-- نقد و نظرات -->
            <div class="content-box" style="display: none;">
            <ul class="sort-menu">
               <li>
                  <i class="fa fa-sliders ms-2 text-red"></i>
                  <span class="sort-by">مرتب‌سازی براساس :</span>
               </li>
               <li><a href="#">جدیدترین</a></li>
               <li><a href="#">مفیدترین</a></li>
            </ul>    

            @if(Auth::user())
            <form action="{{ route('product-comment', $product->id) }}" method="POST">
               @csrf
               <div class="row">
                  <div class="col-xl-2 col-4 mt-3">
                     <label for="" class="worked-form-label">نام و نام‌خانوادگی</label>
                  </div>
                  <div class="col-xl-4 col-8 mt-3">
                     <input type="text" name="name" class="worked-form-input" placeholder="الزامی *"/>
                  </div>

                  <div class="col-xl-2 col-4 mt-3">
                     <label for="" class="worked-form-label">آدرس ایمیل</label>
                  </div>
                  <div class="col-xl-4 col-8 mt-3">
                     <input type="email" name="email" class="worked-form-input" placeholder="الزامی *"/>
                  </div>

                  <div class="col-xl-2 col-4 mt-3">
                     <label for="" class="worked-form-label">دیدگاه شما</label>
                  </div>
                  <div class="col-xl-10 col-8 mt-3">
                     <textarea class="worked-form-input" name="comment" rows="5"></textarea>
                  </div>

                  <div class="col-xl-2 col-4 mt-3">
                     <label for="" class="worked-form-label">امتیاز</label>
                  </div>
                  <div class="col-xl-10 col-8 mt-3">
                     <div class="rating">
                        <input type="radio" name="rate" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rate" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rate" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rate" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rate" value="1" id="1"><label for="1">☆</label>
                    </div>
                  </div>

                  <div class="col-xl-12 mt-3 justify-content-start">
                     <button class="comment-form-button">ثبت نظر</button>
                  </div>
               </div>
            </form>
            @else
            <div class="row">
               <div class="col-xl-12">
                  <div class="blog-comment">برای فرستادن دیدگاه، باید 
                  <a href="{{ route('login') }}" class="blog-comment-link">وارد شده</a>باشید.
                  </div>
               </div>
            </div>
            @endif

            @foreach ($productComment as $item)
               @if ($item->product_id == $product->id)  
                  <div class="mt-3">
                     <ul class="sort-menu">
                        <li class="text-silver">
                           <i class="bi bi-calendar ms-2 text-red"></i>
                           <span class="sort-by">{!! jdate($item->created_at)->format('%d %B %Y') !!}</span>
                        </li>
                        <li class="text-silver">{{ $item->name }}</li>
                     </ul>    
                     <div>{!! $item->comment !!}</div> 
                  </div>
                  <hr>
               @endif
            @endforeach      

            </div>

            <!-- پرسش و پاسخ -->
            <div class="content-box" style="display: none;">

               {{--! Modal --}}
               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <form action="{{ route('ask-comment', $product->id) }}" method="POST">
                           @csrf
                           <label for="comment" class="form-label">پرسش</label>
                           <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                           <button class="ask-form-button mt-3">ارسال پرسش</button>
                        </form>
                     </div>
                  </div>
                  </div>
               </div>
               {{--! Modal --}}

               <ul class="sort-menu">
                  <li>
                     <i class="fa fa-sliders ms-2 text-red"></i>
                     <span class="sort-by">مرتب‌سازی براساس :</span>
                  </li>
                  <li><a href="#">جدیدترین</a></li>
                  <li><a href="#">مفیدترین</a></li>
               </ul>  
               
               {{--! Button trigger modal --}}
               @if(Auth::user())
               <div>
                  <button type="button" class="ask-form-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     ثبت پرسش جدید
                  </button>
               </div>
               @else
               <div class="row">
                  <div class="col-xl-12">
                     <div class="blog-comment">برای ثبت پرسش باید 
                     <a href="{{ route('login') }}" class="blog-comment-link">وارد شده</a>باشید.
                     </div>
                  </div>
               </div>
               @endif
               {{--! Button trigger modal --}}

               @foreach ($askComment as $item)
                  @if ($item->product_id == $product->id)  
                     <div class="mt-3">
                        <ul class="sort-menu">
                           <li class="text-silver">
                              <i class="fa fa-question-circle ms-2 text-red"></i>
                              <span class="sort-by">{!! jdate($item->created_at)->format('%d %B %Y') !!}</span>
                           </li>
                        </ul>    
                        <div>{!! $item->comment !!}</div>
                        <ul class="sort-menu mt-1">
                           @foreach ($replies as $reply)
                              @if ($reply->comment_id == $item->id)  
                                 <li class="text-silver">
                                    <i class="fa fa-reply ms-2 text-red"></i>
                                 </li>
                                 <div class="text-black mt-3">{!! $reply->reply !!}</div>
                              @endif
                           @endforeach 
                        </ul> 
                     </div>
                     <hr>
                  @endif
               @endforeach      

            </div>
         </div>
      </div>
   </div>
</div>         
{{--! Product --}}

{{--! special --}}
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
                                    <form action="">
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