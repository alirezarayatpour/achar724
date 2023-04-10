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
            <form action="{{ route('suggest.store') }}" method="POST">
               @csrf
               <div class="form-group">
                  <label for="store" class="form-label">نام فروشگاه یا شرکت</label>
                  <input type="text" name="store" class="form-control" />
               </div>

               <div class="form-group mt-3">
                  <label for="price" class="form-label">قیمت محصول</label>
                  <input type="text" name="price" class="form-control" />
               </div>

               <div class="form-group mt-3">
                  <label for="storage" class="form-label">تعداد محصول</label>
                  <input type="text" name="storage" class="form-control" />
               </div>

               <div class="form-group mt-3">
                  <label for="product_id" class="form-label">انتخاب محصول</label>
                  <select name="product_id" id="product_id" class="form-control">
                     <option disabled selected>انتخاب محصول</option>
                     @foreach ($product as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                     @endforeach
                  </select>
               </div>

               <button class="btn btn-success mt-2">افزودن</button>
            </form>
         </div>
      </div>
   </div>
</div>

@endsection

@section('js')
@endsection