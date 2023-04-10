@extends('admin.layouts.app')
@section('title', 'گالری')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('gallery.create') }}" class="btn btn-primary">ایجاد محتوا جدید</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                           <thead>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">عنوان</th>
                                 <th scope="col">توضیحات</th>
                                 <th scope="col">عکس</th>
                                 <th scope="col">وضعیت</th>
                                 <th scope="col">مدیریت</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($gallery as $item)
                                 <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>
                                       @if($item->title)
                                          {{ $item->title }}
                                       @else
                                          ندارد
                                       @endif      
                                    </td>
                                    <td>
                                       @if($item->description)
                                          {!! Str::limit($item->description, '50') !!}
                                       @else
                                          ندارد
                                       @endif      
                                    </td>
                                    <td><img src="{{ asset('images/gallery') . '/' . $item->image }}" alt="" width="100px" height="50px"></td>

                                    @switch($item->status)
                                       @case(0)
                                          @php
                                             $url = route('gallery.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                          @endphp
                                       @break

                                       @case(1)
                                          @php
                                             $url = route('gallery.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                          @endphp
                                       @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('gallery.show', $item->id) }}" class="btn btn-info">مدیریت</a></td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $gallery->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
