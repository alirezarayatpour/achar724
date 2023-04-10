@extends('admin.layouts.app')
@section('title', 'دستگاه کارکرده')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('worked.create') }}" class="btn btn-primary">ایجاد محتوا جدید</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                           <thead>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">عنوان</th>
                                 <th scope="col">توضیحات</th>
                                 <th scope="col">وضعیت</th>
                                 <th scope="col">مدیریت</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($worked as $item)
                                 <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td>{!! Str::limit($item->description, '50') !!}</td>

                                    @switch($item->status)
                                       @case(0)
                                          @php
                                             $url = route('worked.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                          @endphp
                                       @break

                                       @case(1)
                                          @php
                                             $url = route('worked.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                          @endphp
                                       @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('worked.show', $item->id) }}" class="btn btn-info">مدیریت</a></td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
