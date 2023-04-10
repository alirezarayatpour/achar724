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
               <li><a href="{{ route('pages.blogs') }}" class="follow-link-item">مجله / </a></li>
               <li><a href="{{ route('pages.blog', $blog->id) }}" class="follow-link-item active">
                  {{ $blog->title }}
               </a></li>
            </ul>
         </div>
      </div>
   </div>
</div> 
{{--! Links --}}

{{--! Titr --}}
<div class="container-fluid">
   <div class="container">
      <div class="row d-flex bg-blog">
         <div class="col-xl-6 col-lg-6 col-md-6 col-12 everything-center">
            <h1 class="gallery-title">{{ $blog->title }}</h1>
         </div>
         <div class="col-xl-6 col-lg-6 col-md-6 col-12">
            <img src="{{ asset('images/blog').'/'.$blog->image }}" alt="" class="img-fluid permissions-image">
         </div>
      </div>
   </div>
</div>
{{--! Titr --}}

{{--! Blog --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="blog-text">
               {!! $blog->description !!}
            </div>
         </div>
      </div>
   </div>
</div>
{{--! Blog --}}

{{--! Writer And Share --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">

         <div class="col-xl-6 col-lg-6 col-md-6 col-12">
            <div class="d-flex mt-3 text-muted px-2">
               <div class="text-end everything-center">
                  <i class="bi bi-person ms-2"></i>
                  <span>{{ $blog->user->name }}</span>
               </div>
               <div class="text-start everything-center me-3">
                  <i class="fa fa-calendar ms-1"></i>
                  <span>{!! jdate($blog->created_at)->format('%d %B %Y') !!}</span>
               </div>
            </div>
         </div>

         <div class="col-xl-6 col-lg-6 col-md-6 col-12">
            <div class="d-flex align-items-center justify-content-end mt-3 text-muted px-2">
               <div class="">
                 <a href="#" class="social-icon-color">اشتراک گذاری</a>
               </div>
               <div class="social-icon">
                  <a href="#" class="text-red"><i class="bi bi-heart"></i></a>
                  <div class="border-right-social-icon"></div>
                  <a href="#" class="social-icon-color"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="social-icon-color"><i class="bi bi-linkedin"></i></a>
                  <a href="#" class="social-icon-color"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="social-icon-color"><i class="bi bi-whatsapp"></i></a>
                  <a href="#" class="social-icon-color"><i class="bi bi-telegram"></i></a>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>
{{--! Writer And Share --}}

{{--! Form Comment --}}
<div class="container-fluid mt-5">
   <div class="container">
      <h6>دیدگاه شما</h6>
      @if(Auth::user())
      <form action="{{ route('blog-comment', $blog->id) }}" method="POST">
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
   </div>
</div>         
{{--! Form Comment --}}

{{--! Comment --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">

            @foreach ($blogComment as $item)
               @if ($item->blog_id == $blog->id)  
               <div>
                  <ul class="sort-menu">
                     <li class="text-silver">
                        <i class="bi bi-calendar ms-2 text-red"></i>
                        <span class="sort-by">{!! jdate($item->created_at)->format('%d %B %Y') !!}</span>
                     </li>
                     <li class="text-silver">{{ $item->name }}</li>
                  </ul>    
                  <div class="text-silver">{!! $item->comment !!}</div> 
               </div>
               <hr>
               @endif
            @endforeach

         </div>
      </div>
   </div>
</div>
{{--! Comment --}}
@endsection

@section('js')
@endsection