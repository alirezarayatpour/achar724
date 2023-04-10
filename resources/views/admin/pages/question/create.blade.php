@extends('admin.layouts.app')
@section('title', 'سوالات متداول')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('question.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>سوال</label>
                           <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" value="{{ old('question') }}" placeholder="سوال را وارد کنید" />
                           @error('question')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label>جواب</label>
                           <textarea id="mytextarea" name="answer" class=" @error('answer') is-invalid @enderror">
                              {{ old('answer') }}
                           </textarea>
                           @error('answer')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ایجاد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
