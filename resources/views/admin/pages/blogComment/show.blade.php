@extends('admin.layouts.app')
@section('title', 'مدیریت نظرات وبلاگ')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-xl-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title mt-2">نویسنده : {{ $blogComment->name }}</h5>
               <p class="card-text mt-3">تاریخ ایجاد: {!! jdate($blogComment->created_at)->format('%d %B %Y') !!}</p>
               <h4>نظر برای محصول:</h4>
               <p class="card-text">{!! $blogComment->blog->title !!}</p>
               <h4>نظر:</h4>
               <p class="card-text">{!! $blogComment->comment !!}</p>
               <div class="d-flex">
                  <form action="{{ route('blogComment.destroy', $blogComment->id) }}" method="post">
                     @csrf
                     <button class="btn btn-danger">حذف</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
@endsection
