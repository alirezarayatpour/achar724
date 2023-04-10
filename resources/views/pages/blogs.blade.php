@extends('layouts.app')
@section('css')
@endsection

@section('content')
{{--! Titr --}}
<div class="container-fluid">
   <div class="container">
      <div class="row d-flex bg-blogs">
         <div class="col-xl-4 col-6">
            <h1 class="blogs-title">خواندنی‌های کیا صنعت</h1>
         </div>
         <div class="col-xl-6 d-xl-block d-none">
            <p class="blogs-summary">جدیدترین‌ در حوزهانواع قطعات خودرو و لوازم یدکی و تعمیرگاهی</p>
         </div>
         <div class="col-xl-2 col-6 position-relative">
            <img src="{{ asset('Frontend/img/pen-and-paper.png') }}" alt="" class="img-fluid blogs-image-title">
         </div>
      </div>
   </div>
</div>
{{--! Titr --}}

{{--! Top Blogs --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-8 col-lg-6 position-relative">
            @foreach ($blogs as $blog)
               @if ($blog->position == 'سمت راست')
                  <a href="{{ route('pages.blog', $blog->id) }}" class="d-block product-category-link">
                     <img src="{{ asset('images/blog').'/'.$blog->image }}" alt="" class="img-fluid blogs-image-top-right">
                     <h6 class="blogs-text">{{ $blog->title }}</h6>
                  </a>
               @endif
            @endforeach
         </div>
         <div class="col-xl-4 col-lg-6 mt-xl-0 mt-4">
            <div class="row">
               <div class="col-xl-12 position-relative">
                  @foreach ($blogs as $blog)
                     @if ($blog->position == 'سمت چپ بالا')
                        <a href="{{ route('pages.blog', $blog->id) }}" class="d-block product-category-link">
                           <img src="{{ asset('images/blog').'/'.$blog->image }}" alt="" class="img-fluid blogs-image-top-left">
                           <h6 class="blogs-text">{{ $blog->title }}</h6>
                        </a>
                     @endif
                  @endforeach
               </div>
               <div class="col-xl-12 position-relative" style="margin-top: 30px;">
                  @foreach ($blogs as $blog)
                     @if ($blog->position == 'سمت چپ پایین')
                        <a href="{{ route('pages.blog', $blog->id) }}" class="d-block product-category-link">
                           <img src="{{ asset('images/blog').'/'.$blog->image }}" alt="" class="img-fluid blogs-image-top-left">
                           <h6 class="blogs-text">{{ $blog->title }}</h6>
                        </a>
                     @endif
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
{{--! Top Blogs --}}

{{--! Blogs --}}
<div class="container-fluid py-5 mt-5 bgcolor-silver">
   <div class="container">

      <div class="row py-3">
         <div class="col-xl-3">
            <h2>سایر مطالب مجله کیاصنعت</h2>
         </div>
         <div class="col-xl-9 everything-center">
            <div class="line"></div>
         </div>
      </div>

      <div class="row">

         @foreach($blogs as $blog)
         @if ($blog->position == 'سایر مطالب')
            <div class="col-xl-3 col-lg-3 col-md-4 col-12 mt-3">
               <div class="border-blogs">
                  <a href="{{ route('pages.blog', $blog->id) }}" class="d-inline">
                     <img src="{{ asset('images/blog').'/'.$blog->image }}" alt="" class="d-block mx-auto img-fluid blogs-image">
                     <p class="blogs-titr">{{ $blog->title }}</p>
                     <div class="red-line"></div>
                  </a>
                  <div class="blogs-description">{!! Str::limit($blog->description, '150') !!}</div>
                  <div class="d-flex mt-3 text-muted px-2">
                     <div class="w-50 text-end">
                        <i class="bi bi-person ms-2"></i>
                        <span>{{ $blog->user->name }}</span>
                     </div>
                     <div class="w-50 text-start">
                        <i class="fa fa-calendar"></i>
                        <span>{!! jdate($blog->created_at)->format('%d %B %Y') !!}</span>
                     </div>
                  </div>
               </div>
            </div>
         @endif
         @endforeach

      </div>

      <div class="row mt-5">
         <div class="col-xl-9 col-lg-9 col-md-6 col-2 everything-center">
            <div class="line"></div>
         </div>
         <div class="col-xl-3 col-lg-3 col-md-6 col-10">
            <a href="" class="text-center more-content">مشاهده مطالب بیشتر</a>
         </div>
      </div>       

   </div>
</div>
{{--! Blogs --}}
@endsection

@section('js')
@endsection