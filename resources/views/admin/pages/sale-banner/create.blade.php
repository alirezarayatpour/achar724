@extends('admin.layouts.app')
@section('title', 'بنرهای صفحه تخفیفات')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('sale-banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>آپلود بنر</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                           <label>لینک</label>
                           <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" />
                           <span class="text-danger">
                               @error('link')
                                   {{ $message }}
                               @enderror
                           </span>
                       </div>
                        <div class="form-group">
                            <label>موقعیت بنر</label>
                            <select name="position" id="position"
                                class="form-control @error('position') is-invalid @enderror">
                                <option disabled selected>انتخاب موقعیت</option>
                                <option value="سمت راست">سمت راست</option>
                                <option value="سمت چپ">سمت چپ</option>
                            </select>
                            <span class="text-danger">
                                @error('position')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ایجاد بنر</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
