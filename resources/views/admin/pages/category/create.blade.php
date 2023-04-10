@extends('admin.layouts.app')
@section('title', 'دسته‌بندی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>نام دسته‌بندی</label>
                           <input type="text" name="category" class="form-control @error('category') is-invalid @enderror"  value="{{ old('category') }}" placeholder="نام دسته‌بندی را وارد کنید"/>
                           @error('category')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label>نام دسته‌بندی مادر</label>
                           <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                              <option value="0">بدون دسته‌بندی مادر</option>
                              @foreach($category as $item)
                                 <option value="{{ $item->id }}">{{ $item->category }}</option>
                              @endforeach
                           </select>
                           @error('parent_id')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label>عکس</label>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"/>
                           @error('image')
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

                        <button type="submit" class="btn btn-success mt-2">ایجاد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
