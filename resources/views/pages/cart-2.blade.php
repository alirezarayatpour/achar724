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
                  <a href="{{ route('pages.cart-1') }}" class="cart-link">
                     <span>سبد خرید</span>
                     <i class="bi bi-cart me-1"></i>
                  </a>
               </li>
               <li class="ms-2">
                  <a href="{{ route('pages.cart-2') }}" class="cart-link active">
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
                     <span class="cart-title">لیست خرید بعدی شما</span>
                     <span class="cart-number">2 کالا</span>
                  </div>
                  <div class="col-xl-6 col-6 position-relative">
                     <a href="#" class="move-another-cart">
                        <span>انتقال همه به سبد خرید</span>
                        <i class="fas fa-angle-left me-2"></i>
                     </a>
                  </div>
               </div>

               <div class="row p-3">
                  <div class="col-xl-2">
                     <a href="#"><img src="{{ asset('Frontend/img/download.jpg') }}" alt="" class="img-fluid cart-image"></a>
                  </div>

                  <div class="col-xl-10">
                     <a href="#" class="cart-product-name">پیچ گوشتی شارژی مدل aw50</a>
                     <ul class="mt-2">
                        <li class="cart-link">
                           <i class="bi bi-shield-check"></i>
                           <span>گارانتی اصالت و سلامت فیزیکی کالا</span>
                        </li>
                        <li class="cart-link">
                           <i class="bi bi-cart-check"></i>
                           <span>موجود در انبار کیا صنعت</span>
                        </li>
                        <li class="cart-link">
                           <i class="bi bi-truck" style="color: orange;"></i>
                           <span>ارسال کالا از یک روز کاری آینده</span>
                        </li>
                     </ul>
                  </div>
               </div>

               <div class="row">
                  <div class="col-xl-12 d-flex">
                     <form action="">
                        <button class="delete-cart-btn">حذف<i class="bi bi-trash me-2"></i></button>
                     </form>
                     <form action="" class="me-2">
                        <button class="add-cart-btn">افزودن به سبد خرید<i class="bi bi-cart-plus me-2"></i></button>
                     </form>
                     <div class="me-3">
                        <div class="text-red">25.000 تومان تخفیف</div>
                        <div class="cart-title">125.000 تومان</div>
                     </div>
                  </div>
               </div>

               <hr>

               <div class="row p-3">
                  <div class="col-xl-2">
                     <a href="#"><img src="{{ asset('Frontend/img/download.jpg') }}" alt="" class="img-fluid cart-image-unavailable"></a>
                  </div>

                  <div class="col-xl-10">
                     <a href="#" class="cart-product-name">پیچ گوشتی شارژی مدل aw50</a>
                     <ul class="mt-2">
                        <li class="cart-link">
                           <i class="bi bi-shield-check"></i>
                           <span>گارانتی اصالت و سلامت فیزیکی کالا</span>
                        </li>
                        <li class="cart-link">
                           <i class="bi bi-cart-check"></i>
                           <span>موجود در انبار کیا صنعت</span>
                        </li>
                        <li class="cart-link">
                           <i class="bi bi-truck" style="color: orange;"></i>
                           <span>ارسال کالا از یک روز کاری آینده</span>
                        </li>
                     </ul>
                  </div>
               </div>

               <div class="row">
                  <div class="col-xl-12 d-flex">
                     <form action="">
                        <button class="delete-cart-btn">حذف<i class="bi bi-trash me-2"></i></button>
                     </form>
                     <div class="unavailable">
                        <i class="bi bi-x-lg"></i>
                        <span>ناموجود</span>
                     </div>
                  </div>
               </div>

            </div>
         </div>

         <div class="col-xl-3 mt-xl-0 mt-3">
            <div class="border-cart p-3">
               <div class="count-deliver">
                  با استفاده از این امکان قادر خواهید بود، محصولاتی که
                  موقتاً قصد خرید آن‌ها را ندارید به لیست خرید بعدی
                  اضافه نموده و در صورت لزوم بخشی و یا تمامی موارد
                  این قسمت را به سبد خرید خود اضافه نمایید.
               </div>

               <a href="#" class="checkout-btn-outline">انتقال همه به سبد خرید</a>
            </div>
         </div>

      </div>
   </div>
</div>
{{--! Cart --}}
@endsection

@section('js')
@endsection