@extends('admin.layouts.app')
@section('title', 'آیتم‌های فوتر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('footer-item.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>عنوان</label>
                           <input type="text" name="item" class="form-control @error('item') is-invalid @enderror" value="{{ old('item') }}" placeholder="عنوان را وارد کنید"/>
                           <span class="text-danger">
                               @error('item')
                                   {{ $message }}
                               @enderror
                           </span>
                        </div>

                        <div class="form-group">
                           <label>لینک</label>
                           <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}" placeholder="لینک را وارد کنید"/>
                           <span class="text-danger">
                               @error('link')
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
