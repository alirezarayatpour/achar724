@extends('layouts.app')
@section('css')
@endsection

@section('content')
{{--! Cart --}}
<div class="container-fluid" style="border-top: 1px solid #c2c2c2;">
   <div class="container mt-3">
      <div class="row">
         <div class="col-xl-12" style="border-bottom: 1px solid #c2c2c2;">
            <ul class="d-inline-flex">
               <li class="ms-2">
                  <a href="{{ route('pages.cart-1') }}" class="cart-link active">
                     <span>سبد خرید</span>
                     <i class="bi bi-cart me-1"></i>
                  </a>
               </li>
               <li class="ms-2">
                  <a href="{{ route('pages.cart-2') }}" class="cart-link">
                     <span>خرید بعدی</span>
                     <i class="bi bi-cart me-1"></i>
                  </a>
               </li>
            </ul>    
         </div>
      </div>
   </div>
</div>

<div class="container-fluid">
   <div class="container mt-3">
      <div class="row">

         <div class="col-xl-9">
            <div class="border-cart p-3">

               <div class="row">
                  <div class="col-xl-6 col-6">
                     <span class="cart-title">سبد خرید شما</span>
                     <span class="cart-number">2 کالا</span>
                  </div>
                  <div class="col-xl-6 col-6 position-relative">
                     <i class="bi bi-three-dots-vertical dots" role="button"></i>
                     <div class="more-option-cart">
                        <a href="#" class="more-option-cart-link">
                           <i class="bi bi-menu-down ms-2"></i>
                           <span>انتقال به لیست خرید بعدی</span>
                        </a>
                        <form action="">
                           <button class="more-option-cart-btn-delete">
                              <i class="bi bi-trash"></i>
                              حذف همه موارد
                           </button>
                        </form>
                     </div>
                  </div>
               </div>

               @foreach($cart as $item)
               <div class="row p-3">
                  <div class="col-xl-2">
                     <a href="{{ route('pages.product', $item->product->id) }}">
                        <img src="{{ asset('image/cover').'/'.$item->product->cover }}" alt="" class="img-fluid cart-image">
                     </a>
                     <div class="border-add-reduce mt-3">
                        <form action="{{ route('cart-plus', $item->id) }}" method="POST">
                           @csrf
                           <button class="add-reduce-btn"><i class="bi bi-plus"></i></button>
                        </form>
                        <span class="text-red">{{ $item->count }}</span>
                        @if ($item->count == 1)
                           <form action="{{ route('cart-remove', $item->id) }}" method="POST">
                              @csrf
                              <button class="add-reduce-btn"><i class="bi bi-trash"></i></button>
                           </form>
                        @else
                           <form action="{{ route('cart-minus', $item->id) }}" method="POST">
                              @csrf
                              <button class="add-reduce-btn"><i class="bi bi-dash"></i></button>
                           </form>
                        @endif
                        
                     </div>
                  </div>

                  <div class="col-xl-10">
                     <a href="#" class="cart-product-name">{{ $item->product->title }}</a>
                     <ul class="mt-2">
                        <li class="cart-information">
                           <i class="bi bi-shield-check"></i>
                           <span>گارانتی اصالت و سلامت فیزیکی کالا</span>
                        </li>
                        <li class="cart-information">
                           <i class="bi bi-cart-check"></i>
                           <span>موجود در انبار کیا صنعت</span>
                        </li>
                        <li class="cart-information">
                           <i class="bi bi-truck" style="color: orange;"></i>
                           <span>ارسال کالا از یک روز کاری آینده</span>
                        </li>
                     </ul>
                     <div class="text-red">
                        @if($item->product->sale)
                        {{ number_format($item->product->price - ($item->product->price * $item->product->sale / 100)) }} تومان تخفیف
                        @else
                        تخفیف ندارد
                        @endif
                     </div>
                     <div class="cart-title">
                        @if($item->product->sale)
                        {{ number_format($item->product->price * $item->product->sale / 100) }} تومان
                        @else
                        {{ number_format($item->product->price) }} تومان
                        @endif
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-xl-12">
                     <a href="#" class="move-another-cart">
                        <span>انتقال به لیست خرید بعدی</span>
                        <i class="fas fa-angle-left me-2"></i>
                     </a>
                  </div>
               </div>

               <hr>
               @endforeach

            </div>
         </div>

         <div class="col-xl-3 mt-xl-0 mt-3">
            <div class="border-cart p-3">

               <div class="d-flex cart-info-1">
                  <div class="w-50 text-end">
                     <span>قیمت کالاها (2)</span>
                  </div>
                  <div class="w-50 text-start">
                     <span>
                        @if($item->product->sale)
                        {{ number_format($totalPrice * $item->product->sale / 100) }} تومان
                        @else
                        {{ number_format($totalPrice) }} تومان
                        @endif
                     </span>
                  </div>
               </div>

               <div class="d-flex mt-2 cart-info-2">
                  <div class="w-50 text-end">
                     <span>جمع سبد خرید</span>
                  </div>
                  <div class="w-50 text-start">
                     <span>
                        @if($item->product->sale)
                        {{ number_format($totalPrice * $item->product->sale / 100) }} تومان
                        @else
                        {{ number_format($totalPrice) }} تومان
                        @endif
                     </span>
                  </div>
               </div>

               <div class="count-deliver">
                  هزینه ارسال براساس آدرس، زمان تحویل، وزن و حجم مرسوله شما محاسبه می‌شود.
               </div>

               <div class="d-flex mt-2 cart-info-3">
                  <div class="w-50 text-end">
                     <span>سود شما از خرید</span>
                  </div>
                  <div class="w-50 text-start">
                     <span>
                        @if($item->product->sale)
                        {{ number_format($totalPrice - ($totalPrice * $item->product->sale / 100)) }} تومان
                        @else
                        0 تومان
                        @endif
                     </span>
                  </div>
               </div>

               <a href="#" class="checkout-btn">پرداخت فاکتور</a>

            </div>
            <div class="count-deliver">
               هزینه این فاکتور هنوز پرداخت نشده و در صورت اتمام موجودی، محصول موردنظر از سبد خرید شما حذف خواهد گردید.
            </div>
         </div>

      </div>
   </div>
</div>
{{--! Cart --}}

{{--! Suggest --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row py-5 border-cart">
         <div class="col-xl-11 ms-auto me-auto position-relative">
            <h4 class="text-end">محصولات پیشنهادی</h4>
            <div class="swiper mySwiper mt-5">
               <div class="swiper-wrapper">

                  <div class="swiper-slide">
                     <div class="border-special">
                        <a href="#"><img src="{{ asset('Frontend/img/download.jpg') }}" alt="" class="special-image"></a>
                        <p>پیچ گوشتی شارژی مدل aw50</p>
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
                              <span class="price">23.000.000</span><span class="me-1">تومان</span>
                              <div class="text-muted"><del>25.000.000</del></div>
                           </div>
                           <div class="w-50 text-start">
                              <form action="">
                                 <button class="cart-shopping"><i class="fa fa-shopping-cart"></i></button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="swiper-slide">
                     <div class="border-special">
                        <a href="#"><img src="{{ asset('Frontend/img/download.jpg') }}" alt="" class="special-image"></a>
                        <p>پیچ گوشتی شارژی مدل aw50</p>
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
                              <span class="price">23.000.000</span><span class="me-1">تومان</span>
                              <div class="text-muted"><del>25.000.000</del></div>
                           </div>
                           <div class="w-50 text-start">
                              <form action="">
                                 <button class="cart-shopping"><i class="fa fa-shopping-cart"></i></button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="swiper-slide">
                     <div class="border-special">
                        <a href="#"><img src="{{ asset('Frontend/img/download.jpg') }}" alt="" class="special-image"></a>
                        <p>پیچ گوشتی شارژی مدل aw50</p>
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
                              <span class="price">23.000.000</span><span class="me-1">تومان</span>
                              <div class="text-muted"><del>25.000.000</del></div>
                           </div>
                           <div class="w-50 text-start">
                              <form action="">
                                 <button class="cart-shopping"><i class="fa fa-shopping-cart"></i></button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="swiper-slide">
                     <div class="border-special">
                        <a href="#"><img src="{{ asset('Frontend/img/download.jpg') }}" alt="" class="special-image"></a>
                        <p>پیچ گوشتی شارژی مدل aw50</p>
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
                              <span class="price">23.000.000</span><span class="me-1">تومان</span>
                              <div class="text-muted"><del>25.000.000</del></div>
                           </div>
                           <div class="w-50 text-start">
                              <form action="">
                                 <button class="cart-shopping"><i class="fa fa-shopping-cart"></i></button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="swiper-slide">
                     <div class="border-special">
                        <a href="#"><img src="{{ asset('Frontend/img/download.jpg') }}" alt="" class="special-image"></a>
                        <p>پیچ گوشتی شارژی مدل aw50</p>
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
                              <span class="price">23.000.000</span><span class="me-1">تومان</span>
                              <div class="text-muted"><del>25.000.000</del></div>
                           </div>
                           <div class="w-50 text-start">
                              <form action="">
                                 <button class="cart-shopping"><i class="fa fa-shopping-cart"></i></button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="swiper-slide">
                     <div class="border-special">
                        <a href="#"><img src="{{ asset('Frontend/img/download.jpg') }}" alt="" class="special-image"></a>
                        <p>پیچ گوشتی شارژی مدل aw50</p>
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
                              <span class="price">23.000.000</span><span class="me-1">تومان</span>
                              <div class="text-muted"><del>25.000.000</del></div>
                           </div>
                           <div class="w-50 text-start">
                              <form action="">
                                 <button class="cart-shopping"><i class="fa fa-shopping-cart"></i></button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   let dots = document.querySelector('.dots'); 
   let moreOptionCart = document.querySelector('.more-option-cart'); 

   dots.addEventListener('click', function(){
      moreOptionCart.classList.toggle('active-more-option-cart');
   });
</script>
{{--! Suggest --}}

@endsection
@section('js')
@endsection