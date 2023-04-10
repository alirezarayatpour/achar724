@extends('admin.layouts.app')
@section('title', 'وبلاگ')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
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

                        <div class="form-group">
                           <label>موقعیت وبلاگ (مقدار پیش فرض سایر مطالب است)</label>
                           <select name="position" id="position" class="form-control @error('position') is-invalid @enderror">
                               <option value="سایر مطالب">سایر مطالب</option>
                               <option value="سمت راست">سمت راست</option>
                               <option value="سمت چپ بالا">سمت چپ بالا</option>
                               <option value="سمت چپ پایین">سمت چپ پایین</option>
                              </select>
                           <span class="text-danger">
                               @error('position')
                                   {{ $message }}
                               @enderror
                           </span>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ایجاد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
