@extends('admin.layouts.app')
@section('title', 'مدیریت نظرات محصولات')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-xl-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title mt-2">نویسنده : {{ $productComment->name }}</h5>
               <h5 class="card-title mt-2">امتیاز : {{ $productComment->rate }}</h5>
               <p class="card-text mt-3">تاریخ ایجاد: {!! jdate($productComment->created_at)->format('%d %B %Y') !!}</p>
               <h4>نظر برای محصول:</h4>
               <p class="card-text">{!! $productComment->product->title !!}</p>
               <h4>نظر:</h4>
               <p class="card-text">{!! $productComment->comment !!}</p>
               <div class="d-flex">
                  <form action="{{ route('productComment.destroy', $productComment->id) }}" method="post">
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
