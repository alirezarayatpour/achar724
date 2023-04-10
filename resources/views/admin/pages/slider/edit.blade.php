@extends('admin.layouts.app')
@section('title', 'اسلایدر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>عکس</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>لینک</label>
                            <input type="text" name="link" class="form-control" value="{{ $slider->link }}" />
                        </div>
                        <div class="form-group">
                            <label>موقعیت</label>
                            <select name="position" id="position" class="form-control">
                                @switch($slider->position)
                                    @case(1)
                                        @php
                                            $position = 'صفحه اصلی';
                                        @endphp
                                    @break

                                    @case(2)
                                        @php
                                            $position = 'صفحه ثبت دستگاه کارکرده';
                                        @endphp
                                    @break

                                    @case(3)
                                        @php
                                            $position = 'صفحه دسته‌بندی کلی';
                                        @endphp
                                    @break
                                @endswitch
                                <option value="{{ $slider->position }}" {{ $slider->position ? 'selected' : '' }}>{{ $position }}</option>
                                <option value="1">صفحه اصلی</option>
                                <option value="2">صفحه ثبت دستگاه کارکرده</option>
                                <option value="3">صفحه دسته‌بندی کلی</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
