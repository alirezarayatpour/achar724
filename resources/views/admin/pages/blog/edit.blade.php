@extends('admin.layouts.app')
@section('title', 'وبلاگ')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>عنوان</label>
                            <input type="text" name="title" class="form-control" value="{{ $blog->title }}"/>
                        </div>
                        <div class="form-group">
                            <label>توضیحات</label>
                            <textarea id="mytextarea" name="description">{{ $blog->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>عکس</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="form-group">
                           <label>موقعیت وبلاگ</label>
                           <select name="position" id="position" class="form-control @error('position') is-invalid @enderror">
                              <option value="{{ $blog->position }}" {{ $blog->position ? 'selected' : '' }}>{{ $blog->position }}</option>
                               <option value="سمت راست">سمت راست</option>
                               <option value="سمت چپ بالا">سمت چپ بالا</option>
                               <option value="سمت چپ پایین">سمت چپ پایین</option>
                               <option value="سایر مطالب">سایر مطالب</option>
                           </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
