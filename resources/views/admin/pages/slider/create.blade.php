@extends('admin.layouts.app')
@section('title', 'اسلایدر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>عکس</label>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                           @error('image')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>

                        <div class="form-group">
                           <label>لینک (می‌تواند خالی باشد)</label>
                           <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}" placeholder="لینک را وارد کنید" />
                           @error('link')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label>موقعیت</label>
                           <select name="position" id="position" class="form-control @error('position') is-invalid @enderror">
                              <option selected disabled>انتخاب موقعیت اسلایدر</option>
                              <option value="1">صفحه اصلی</option>
                              <option value="2">صفحه ثبت دستگاه کارکرده</option>
                              <option value="3">صفحه دسته‌بندی کلی</option>
                           </select>
                           @error('position')
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
