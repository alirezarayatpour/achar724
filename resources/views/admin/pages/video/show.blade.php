@extends('admin.layouts.app')
@section('title', 'ویدیو')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mt-2">{{ $video->title }}</h3>
                    <video src="{{ asset('videos/video').'/'.$video->video }}" class="embed-responsive" controls></video>
                    <div class="card-text mt-3">{!! $video->description !!}</div>
                    <div class="d-flex">
                        <form action="{{ route('video.destroy', $video->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('video.edit', $video->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
