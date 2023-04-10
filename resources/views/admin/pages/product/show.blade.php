@extends('admin.layouts.app')
@section('title', 'محصولات')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">

               <div class="table-responsive">
                  <table class="table">
                     <tr>
                        <td>تصاویر محصول</td>
                        <td>
                           @foreach($images as $image)
                              @if($product->id == $image->product_id)
                                 <img src="{{ asset('image/images'.'/'.$image->image) }}" alt=""
                                    class="img-fluid mt-3 mr-3" style="width: 100px; height: 100px;">
                              @endif
                           @endforeach
                        </td>
                     </tr>
                     <tr>
                        <td>نام محصول</td>
                        <td>{{ $product->title }}</td>
                     </tr>
                     <tr>
                        <td>ویژگی محصول</td>
                        <td>{{ $product->feature }}</td>
                     </tr>
                     <tr>
                        <td>توضیحات</td>
                        <td>{!! $product->description !!}</td>
                     </tr>
                     <tr>
                        <td>تعداد محصول</td>
                        <td>{{ $product->storage }}</td>
                     </tr>
                     <tr>
                        <td>قیمت</td>
                        @if ($product->sale)
                           <td scope="row">{{ number_format($product->price *  $product->sale / 100) }} تومان</td>
                        @else
                           <td scope="row">{{ number_format($product->price) }} تومان</td>
                        @endif
                     </tr>
                     <tr>
                        <td>تخفیف</td>
                        <td>{{ $product->sale }}@if($product->sale)%@endif @if(!$product->sale) ندارد @endif</td>
                     </tr>
                     <tr>
                        <td>وزن</td>
                        <td>{{ $product->weight }} کیلوگرم</td>
                     </tr>
                     <tr>
                        <td>حداکثر ظرفیت</td>
                        <td>{{ $product->capacity }} کیلوگرم</td>
                     </tr>
                     <tr>
                        <td>موقعیت</td>
                        <td>{{ $product->position }}</td>
                     </tr>
                     <tr>
                        <td>برند</td>
                        <td>{{ $product->brand }}</td>
                     </tr>
                     <tr>
                        <td>عضو دسته‌بندی</td>
                        <td>{{ $product->category->category }}</td>
                     </tr>
                     <tr>
                        <td>
                           <form action="{{ route('product.destroy', $product->id) }}" method="post">
                              @csrf
                              <button class="btn btn-danger">حذف</button>
                           </form>
                        </td>
                        <td>
                           <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                        </td>
                     </tr>
                  </table>
               </div>

            </div>
         </div>
      </div>
   </div>
@endsection
