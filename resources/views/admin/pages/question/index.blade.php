@extends('admin.layouts.app')
@section('title', 'سوالات متداول')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('question.create') }}" class="btn btn-primary">ایجاد محتوا جدید</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                           <thead>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">سوال</th>
                                 <th scope="col">پاسخ</th>
                                 <th scope="col">وضعیت</th>
                                 <th scope="col">مدیریت</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($question as $item)
                                 <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->question }}</td>
                                    <td>{!! Str::limit($item->answer, '50') !!}</td>

                                    @switch($item->status)
                                       @case(0)
                                          @php
                                             $url = route('question.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                          @endphp
                                       @break

                                       @case(1)
                                          @php
                                             $url = route('question.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                          @endphp
                                       @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('question.show', $item->id) }}" class="btn btn-info">مدیریت</a></td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $question->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
