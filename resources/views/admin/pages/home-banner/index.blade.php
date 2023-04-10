@extends('admin.layouts.app')
@section('title', 'بنرهای صفحه اصلی')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('home-banner.create') }}" class="btn btn-primary">ایجاد بنر</a>

            <div class="card mt-2">
                <div class="card-body">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">موقعیت</th>
                                <th scope="col">بنر</th>
                                <th scope="col">لینک</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($homeBanner as $item)
                              <tr>
                                 <th scope="row">{{ $item->id }}</th>
                                 <td>{{ $item->position }}</td>
                                 <td><img src="{{ asset('images/home-banner') . '/' . $item->image }}" alt="" width="150px" height="50px"></td>
                                 @if($item->link)
                                 <td>{{ $item->link }}</td>
                                 @else
                                 <td>لینک ندارد</td>
                                 @endif

                                 @switch($item->status)
                                    @case(0)
                                       @php
                                          $url = route('home-banner.status', $item->id);
                                          $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                       @endphp
                                    @break

                                    @case(1)
                                       @php
                                          $url = route('home-banner.status', $item->id);
                                          $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                       @endphp
                                    @break
                                 @endswitch

                                 <td>{!! $status !!}</td>
                                 <td><a href="{{ route('home-banner.edit', $item->id) }}" class="btn btn-info">ویرایش</a></td>
                                 <td>
                                    <form action="{{ route('home-banner.destroy', $item->id) }}" method="POST">
                                       @csrf
                                       <button class="btn btn-danger">حذف</button>
                                    </form>
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $homeBanner->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
