@extends('layouts.app')
@section('css')
@endsection

@section('content')
{{--! Links --}}
<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <ul class="follow-link">
               <li><a href="{{ route('pages.index') }}" class="follow-link-item">کیا صنعت / </a></li>
               <li><a href="#" class="follow-link-item">محصولات / </a></li>
               @foreach ($paras as $para)
                  <li><a href="{{ route('pages.all-category', $para->id) }}" class="follow-link-item">
                     {{ $para->category }} / 
                  </a></li>
               @endforeach
               <li><a href="{{ route('pages.category', $category->id) }}" class="follow-link-item active">
                  {{ $category->category }}
               </a></li>
            </ul>
         </div>
      </div>
   </div>
</div> 
{{--! Links --}}

{{--! Content --}}
<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">

         <!-- Filters -->
         <div class="col-xl-3 col-lg-3 col-md-12 col-12">

            <span class="filter-mobile" role="button"><i class="fa fa-sliders ms-2"></i>فیلترها</span>
            
            <div class="filter-box p-3">

               <div class="d-flex">
                  <div class="w-50 text-end">
                     <h5 class="">فیلترها</h5>
                  </div>
                  <div class="w-50">
                     <a href="#" class="filter-remove-btn">حذف فیلترها</a>
                  </div>
               </div>

               <div class="filter-content">
                  <span>برند</span>
                  <span class="brand-icon"><i class="fas fa-angle-down" role="button"></i></span>
               </div>
               <div class="brands">
                  @foreach ($brand as $item)
                     <div class="d-flex align-items-center justify-content-between">
                        <label for="">{{ $item->name }}</label>
                        <input type="checkbox" name="{{ $item->name }}" id="{{ $item->name }}" rel="{{ $item->name }}" 
                        class="brands-checkbox" onchange="change()" role="button"> 
                     </div>
                  @endforeach
                  <div class="d-flex align-items-center justify-content-between">
                     <label for="">متفرقه</label>
                     <input type="checkbox" name="متفرقه" id="متفرقه" rel="متفرقه" class="brands-checkbox" onchange="change()" role="button"> 
                  </div>
               </div>

               <div class="filter-content">
                  <span>محدوده قیمت</span>
                  <i class="fas fa-angle-down"></i>
               </div>

               <div class="filter-content">
                  <span>فقط کالاهای موجود</span>
                  <label class="switch" for="exist">
                     <input type="checkbox" id="exist" rel="exist" class="exist" onchange="change()">
                     <span class="slider round"></span>
                  </label>
               </div>

               <div class="filter-content">
                  <span>فقط کالاهای حراجی</span>
                  <label class="switch" for="onsale">
                     <input type="checkbox" id="onsale" rel="onsale" class="onsale" onchange="change()">
                     <span class="slider round"></span>
                  </label>
               </div>

            </div>
            <!-- Filters -->

            <div class="border-cart mt-4 p-3">
               <div class="row">
                  @foreach ($specialProduct as $product) 
                     @if($product->position == 'پیشنهاد ویژه')
                        <div class="col-xl-6 col-6">
                           <h4 class="text-red">پیشنهاد ویژه</h4>
                           <a href="#" class="best-seller-link">{{ $product->title }}</a>
                           <div class="best-seller-price text-end">
                              @if ($product->sale)
                                 {{ number_format(($product->price * $product->sale / 100)) }}
                              @else
                                 {{ number_format($product->price) }}
                              @endif
                           </div>
                           <div class="best-seller-dec">
                              <del>
                                 @if ($product->sale)
                                 {{ number_format($product->price) }}
                                 @endif
                              </del>
                           </div>
                        </div>
                        <div class="col-xl-6 col-6">
                           <a href="{{ route('pages.product', $product->id) }}">
                              <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="img-fluid mx-auto d-block">
                           </a>
                        </div>
                     @endif
                  @endforeach
               </div>
            </div>
         </div>

         <!-- Product List -->
         <div class="col-xl-9 col-lg-9 col-md-12">

            <ul class="sort-menu mt-xl-0 mt-lg-0 mt-3">
               <li>
                  <i class="fa fa-sliders fa-2x ms-2 text-red"></i>
                  <span class="sort-by">مرتب‌سازی براساس :</span>
               </li>
               <li><a href="#" class="active">جدیدترین</a></li>
               <li><a href="#" class="">ارزان‌ترین</a></li>
               <li><a href="#" class="">گران‌ترین</a></li>
            </ul>

            <div class="row filters">

               @foreach ($products as $product) 
                  @if($product->category_id == $category->id)
                  <div class="col-xl-3 col-lg-4 col-md-4 col-6 mt-3 {{ $product->brand }} @if($product->sale) onsale @endif @if($product->storage) exist @endif">
                     <div class="border-category">
                        <a href="{{ route('pages.product', $product->id) }}" class="best-seller-link position-relative">
                           <img src="{{ asset('image/cover').'/'.$product->cover }}" alt=""  class="img-fluid special-image"/>
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
                        <div class="best-seller-dec">{{ $product->title }}</div>
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
                  </div>
                  @endif
               @endforeach
               
            </div>

         </div>
         <!-- Product List -->
      </div>
   </div>
</div>
{{--! Content --}}

{{--! More Description --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            {{-- <h2 class="category-titr">
               پیچ گوشتی شارژی چیست؟
            </h2> --}}
            <div class="category-titr-sub">{!! $category->description !!}</div>
         </div>
      </div>
   </div>
</div>
{{--! More Description --}}
@endsection

@section('js')
@endsection