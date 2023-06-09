@extends('admin.layouts.app')
@section('title', 'محصولات')
@section('content')
   <div class="row">
      <div class="col-md-12">

         @include('message.message')

         <a href="{{ route('product.create') }}" class="btn btn-primary">ایجاد محصول جدید</a>

         <div class="card mt-2">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-striped text-center">
                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">نام محصول</th>
                           <th scope="col">عکس</th>
                           <th scope="col">تعداد محصول</th>
                           <th scope="col">قیمت</th>
                           <th scope="col">تخفیف</th>
                           <th scope="col">موقعیت</th>
                           <th scope="col">برند</th>
                           <th scope="col">موجودی</th>
                           <th scope="col">وضعیت</th>
                           <th scope="col">مدیریت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                           <th scope="row">{{ $product->id }}</th>
                           <th scope="row">{{ $product->title }}</th>
                           <td><img src="{{ asset('image/cover') . '/' . $product->cover }}" alt="" width="150px" height="80px"></td>
                           <th scope="row">{{ $product->storage }}</th>

                           @if ($product->sale)
                              <th scope="row">{{ number_format($product->price *  $product->sale / 100) }} تومان</th>
                           @else
                              <th scope="row">{{ number_format($product->price) }} تومان</th>
                           @endif
                              <th scope="row">{{ $product->sale }}@if($product->sale)%@endif @if(!$product->sale) ندارد @endif</th>

                           <th scope="row">{{ $product->position }}</th>
                           <th scope="row">{{ $product->brand }}</th>

                           <td>
                              @if ($product->storage)
                                 <span class="text-success">موجود</span>
                              @elseif($product->storage == 0)   
                                 <span class="text-danger">ناموجود</span>
                              @endif
                           </td>

                           @switch($product->status)
                                 @case(0)
                                 @php
                                    $url = route('product.status', $product->id);
                                    $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                 @endphp
                                 @break

                                 @case(1)
                                 @php
                                    $url = route('product.status', $product->id);
                                    $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                 @endphp
                                 @break
                           @endswitch

                           <td>{!! $status !!}</td>
                           <td><a href="{{ route('product.show', $product->id) }}" class="btn btn-info">مدیریت</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                     </table>
                  </div>
            </div>
         </div>
         {{ $products->links('vendor/pagination/bootstrap-5') }}
      </div>
   </div>
@endsection
