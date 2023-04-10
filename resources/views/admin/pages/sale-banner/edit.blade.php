@extends('admin.layouts.app')
@section('title', 'بنرهای صفحه تخفیفات')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('sale-banner.update', $saleBanner->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>آپلود بنر</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="form-group">
                           <label>لینک</label>
                           <input type="text" name="link" class="form-control" value="{{ $saleBanner->link }}"/>
                       </div>
                        <div class="form-group">
                            <label>موقعیت بنر</label>
                            <select name="position" id="position" class="form-control">
                                 <option value="{{ $saleBanner->position }}" {{ $saleBanner->position ? 'selected' : '' }}>{{ $saleBanner->position }}</option>
                                 <option value="سمت راست">سمت راست</option>
                                 <option value="سمت چپ">سمت چپ</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش بنر</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
