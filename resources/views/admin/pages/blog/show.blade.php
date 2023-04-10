@extends('admin.layouts.app')
@section('title', 'وبلاگ')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mt-2">{{ $blog->title }}</h3>
                    <img src="{{ asset('images/blog').'/'.$blog->image }}" alt="" class="img-fluid mt-3"/>
                    <div class="card-text mt-3">{!! $blog->description !!}</div>
                    <div class="d-flex">
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
