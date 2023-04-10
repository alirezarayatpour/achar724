@extends('admin.layouts.app')
@section('title', 'گالری')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mt-2">{{ $gallery->title }}</h3>
                    <img src="{{ asset('images/gallery').'/'.$gallery->image }}" alt="" class="img-fluid mt-3"/>
                    <div class="card-text mt-3">{!! $gallery->description !!}</div>
                    <div class="d-flex">
                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
