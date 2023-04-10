@extends('admin.layouts.app')
@section('title', 'پرسش و پاسخ محصولات')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-xl-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title mt-2">نویسنده : {{ $askComment->user->name }}</h5>
               <p class="card-text mt-3">تاریخ ایجاد: {!! jdate($askComment->created_at)->format('%d %B %Y') !!}</p>
               <h4>پرسش برای محصول:</h4>
               <p class="card-text">{!! $askComment->product->title !!}</p>
               <h4>پرسش:</h4>
               <p class="card-text">{!! $askComment->comment !!}</p>
               <div class="d-flex">
                  <form action="{{ route('askComment.destroy', $askComment->id) }}" method="post">
                     @csrf
                     <button class="btn btn-danger">حذف</button>
                  </form>
                  <a href="{{ route('reply.index', $askComment->id) }}" class="btn btn-primary mr-3">پاسخ</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
@endsection
