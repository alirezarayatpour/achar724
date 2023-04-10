@extends('admin.layouts.app')
@section('title', 'دستگاه کارکرده')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('worked.update', $worked->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>عنوان</label>
                            <input type="text" name="title" class="form-control" value="{{ $worked->title }}"/>
                        </div>

                        <div class="form-group">
                            <label>توضیحات</label>
                            <textarea id="mytextarea" name="description">{{ $worked->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
