@extends('admin.layouts.app')
@section('title', 'خدمات')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('service.update', $service->id) }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                           <label>عنوان</label>
                           <input type="text" name="name" class="form-control" value="{{ $service->name }}"  />
                        </div>

                        <div class="form-group">
                           <label>آیکون</label>
                           <input type="text" name="icon" class="form-control" value="{{ $service->icon }}"  />
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
