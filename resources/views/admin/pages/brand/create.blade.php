@extends('admin.layouts.app')
@section('title', 'برندها')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                           <label>نام برند</label>
                           <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="نام برند را وارد کنید">  
                           <span class="text-danger">
                              @error('name')
                                 {{ $message }}
                              @enderror
                           </span>
                        </div>

                        <div class="form-group">
                           <label>لوگو</label>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                           <span class="text-danger">
                              @error('image')
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
