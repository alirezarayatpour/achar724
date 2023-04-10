@extends('admin.layouts.app')
@section('title', 'فرم عضویت در خبرنامه')
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
                                 <th scope="col">ایمیل</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($newsRequest as $item)
                                 <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->email }}</td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $newsRequest->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
