@extends('admin.layouts.app')
@section('title', 'مجوزها')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('permission.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>عنوان</label>
                           <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="عنوان را وارد کنید" />
                           @error('title')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label>توضیحات</label>
                           <textarea id="mytextarea" name="description" class=" @error('description') is-invalid @enderror">
                              {{ old('description') }}
                           </textarea>
                           @error('description')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <div class="form-group">
                            <label>عکس</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                           @error('image')
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
