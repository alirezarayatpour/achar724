@extends('admin.layouts.app')
@section('title', 'سوالات متداول')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('question.update', $question->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>سوال</label>
                            <input type="text" name="question" class="form-control" value="{{ $question->question }}"/>
                        </div>
                        <div class="form-group">
                            <label>پاسخ</label>
                            <textarea id="mytextarea" name="answer">{{ $question->answer }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
