@extends('admin.layouts.app')
@section('title', 'آیتم‌های هدر')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('header-item.create') }}" class="btn btn-primary">ایجاد آیتم</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped item-center">
                           <thead>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">آیکون</th>
                                 <th scope="col">آیتم</th>
                                 <th scope="col">لینک</th>
                                 <th scope="col">وضعیت</th>
                                 <th scope="col">ویرایش</th>
                                 <th scope="col">حذف</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($headerItem as $item)
                                 <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td><i class="{{ $item->icon }}"></i></td>
                                    <td>{{ $item->item }}</td>
                                    <td>{{ $item->link }}</td>

                                    @switch($item->status)
                                       @case(0)
                                          @php
                                             $url = route('header-item.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-danger item-white'>غیرفعال</a>";
                                          @endphp
                                       @break

                                       @case(1)
                                          @php
                                             $url = route('header-item.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-success item-white'>فعال</a>";
                                          @endphp
                                       @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('header-item.edit', $item->id) }}" class="btn btn-info">ویرایش</a></td>
                                    <td>
                                       <form action="{{ route('header-item.destroy', $item->id) }}" method="POST">
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
            {{ $headerItem->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
@endsection
