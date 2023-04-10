@extends('layouts.app')
@section('css')
@endsection

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col-xl-12">
         <h3 class="product-titr">حساب کاربری</h3>
      </div>
   </div>
</div>

<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-3">
            @include('layouts.aside')
         </div>
         <div class="col-xl-9">
            <form action="{{ route('change', auth()->user()->id) }}" method="POST">
               @csrf
               <div class="form-group">
                  <label class="form-label">نام *</label>
                  <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
               </div>
               <div class="form-group mt-3">
                  <label class="form-label">آدرس ایمیل *</label>
                  <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
               </div>
               <div class="form-group mt-3">
                  <label class="form-label">گذر واژه فعلی *</label>
                  <input type="password" class="form-control" name="current_password">
               </div>
               <div class="form-group mt-3">
                  <label class="form-label">گذر واژه جدید *</label>
                  <input type="password" class="form-control" name="password">
               </div>
               <div class="form-group mt-3">
                  <label class="form-label">تکرار گذر واژه جدید *</label>
                  <input type="password" class="form-control" name="password_confirmation">
               </div>
               <button class="ask-form-button p-2 mt-3">ذخیره تغییرات</button>
            </form>
         </div>
      </div>
   </div>
</div>

@endsection

@section('js')
@endsection