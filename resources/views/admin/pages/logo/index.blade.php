@extends('admin.layouts.app')
@section('title', 'لوگو')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('logo.create') }}" class="btn btn-primary">ایجاد لوگو</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                           <thead>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">عکس</th>
                                 <th scope="col">موقعیت</th>
                                 <th scope="col">وضعیت</th>
                                 <th scope="col">ویرایش</th>
                                 <th scope="col">حذف</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($logo as $item)
                                 <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td><img src="{{ asset('images/logo') . '/' . $item->image }}" alt="" width="150px" height="50px"></td>
                                    <td>{{ $item->position }}</td>

                                    @switch($item->status)
                                       @case(0)
                                          @php
                                             $url = route('logo.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                          @endphp
                                       @break

                                       @case(1)
                                          @php
                                             $url = route('logo.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                          @endphp
                                       @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('logo.edit', $item->id) }}" class="btn btn-info">ویرایش</a></td>
                                    <td>
                                       <form action="{{ route('logo.destroy', $item->id) }}" method="POST">
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
            </div>
            {{ $logo->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
