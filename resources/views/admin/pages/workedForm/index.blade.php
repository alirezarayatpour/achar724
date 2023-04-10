@extends('admin.layouts.app')
@section('title', 'دستگاه کارکرده')
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
                           <th scope="col">نام</th>
                           <th scope="col">شماره</th>
                           <th scope="col">نام دستگاه</th>
                           <th scope="col">قیمت</th>
                           <th scope="col">عکس</th>
                           <th scope="col">وضعیت</th>
                           <th scope="col">مشاهده کامل</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workedForm as $item)
                        <tr>
                           <th scope="row">{{ $item->id }}</th>
                           <th scope="row">{{ $item->name }}</th>
                           <th scope="row">{{ $item->phone }}</th>
                           <th scope="row">{{ $item->set }}</th>
                           <th scope="row">{{ number_format($item->price) }} تومان</th>
                           <td><img src="{{ asset('images/worked') . '/' . $item->image }}" alt="" width="100px" height="50px"></td>
                           
                           @switch($item->status)
                                 @case(0)
                                 @php
                                    $url = route('workedForm.status', $item->id);
                                    $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                 @endphp
                                 @break

                                 @case(1)
                                 @php
                                    $url = route('workedForm.status', $item->id);
                                    $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                 @endphp
                                 @break
                           @endswitch

                           <td>{!! $status !!}</td>
                           <td><a href="{{ route('workedForm.show', $item->id) }}" class="btn btn-info">مدیریت</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                     </table>
                  </div>
            </div>
         </div>
         {{ $workedForm->links('vendor/pagination/bootstrap-5') }}
      </div>
   </div>
@endsection
