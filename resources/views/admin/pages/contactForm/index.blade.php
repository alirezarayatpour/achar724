@extends('admin.layouts.app')
@section('title', 'فرم تماس')
@section('content')
    <!-- ============================================================== -->
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
                                 <th scope="col">ایمیل</th>
                                 <th scope="col">شماره تماس</th>
                                 <th scope="col">موضوع</th>
                                 <th scope="col">متن پیام</th>
                                 <th scope="col">مدیریت</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($contactForm as $item)
                                 <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{!! Str::limit($item->body, '20') !!}</td>

                                    <td><a href="{{ route('contactForm.show', $item->id) }}" class="btn btn-info">نمایش کامل</a></td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $contactForm->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
