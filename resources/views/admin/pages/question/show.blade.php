@extends('admin.layouts.app')
@section('title', 'سوالات متداول')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mt-2">{{ $question->question }}</h3>
                    <div class="card-text mt-3">{!! $question->answer !!}</div>
                    <div class="d-flex">
                        <form action="{{ route('question.destroy', $question->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger">حذف</button>
                        </form>
                        <a href="{{ route('question.edit', $question->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
