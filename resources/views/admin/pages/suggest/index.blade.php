@extends('admin.layouts.app')
@section('title', 'پیشنهاد محصولات')
@section('content')
   <div class="row">
      <div class="col-md-12">

         @include('message.message')

         <div class="card mt-2">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-striped text-center">
                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">نام فروشگاه</th>
                           <th scope="col">نام محصول</th>
                           <th scope="col">قیمت</th>
                           <th scope="col">تعداد</th>
                           <th scope="col">موجودی</th>
                           <th scope="col">وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suggest as $item)
                        <tr>
                           <th scope="row">{{ $item->id }}</th>
                           <th scope="row">{{ $item->store }}</th>
                           <th scope="row">{{ $item->product->title }}</th>
                           <th scope="row">{{ number_format($item->price) }} تومان</th>
                           <th scope="row">{{ $item->storage }}</th>

                           <td>
                              @if ($item->storage)
                                 <span class="text-success">موجود</span>
                              @elseif($item->storage == 0)   
                                 <span class="text-danger">ناموجود</span>
                              @endif
                           </td>

                           @switch($item->status)
                                 @case(0)
                                 @php
                                    $url = route('suggest.status', $item->id);
                                    $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                 @endphp
                                 @break

                                 @case(1)
                                 @php
                                    $url = route('suggest.status', $item->id);
                                    $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                 @endphp
                                 @break
                           @endswitch

                           <td>{!! $status !!}</td>
                           {{-- <td><a href="{{ route('item.show', $item->id) }}" class="btn btn-info">مدیریت</a></td> --}}
                        </tr>
                        @endforeach
                        </tbody>
                     </table>
                  </div>
            </div>
         </div>
         {{ $suggest->links('vendor/pagination/bootstrap-5') }}
      </div>
   </div>
@endsection
