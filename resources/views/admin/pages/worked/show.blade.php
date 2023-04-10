@extends('admin.layouts.app')
@section('title', 'دستگاه کارکرده')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mt-2">{{ $worked->title }}</h3>
                    <div class="card-text mt-3">{!! $worked->description !!}</div>
                    <div class="d-flex">
                        <form action="{{ route('worked.destroy', $worked->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('worked.edit', $worked->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
