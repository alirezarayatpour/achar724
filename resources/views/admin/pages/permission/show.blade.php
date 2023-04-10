@extends('admin.layouts.app')
@section('title', 'مجوزها')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mt-2">{{ $permissions->title }}</h3>
                    <img src="{{ asset('images/permissions').'/'.$permissions->image }}" alt="" class="img-fluid mt-3"/>
                    <div class="card-text mt-3">{!! $permissions->description !!}</div>
                    <div class="d-flex">
                        <form action="{{ route('permission.destroy', $permissions->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('permission.edit', $permissions->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
