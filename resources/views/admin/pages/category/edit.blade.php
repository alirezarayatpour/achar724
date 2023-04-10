@extends('admin.layouts.app')
@section('title', 'دسته‌بندی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>نام دسته‌بندی</label>
                           <input type="text" name="category" class="form-control"  value="{{ $category->category }}"/>
                        </div>

                        <div class="form-group">
                           <label>نام دسته‌بندی مادر</label>
                           <select name="parent_id" id="parent_id" class="form-control">
                              <option value="0">بدون دسته‌بندی مادر</option>
                              @foreach($categories as $category)
                                 <option value="{{ $category->id }}" {{ $category->parent_id = $category->category ? 'selected' : '' }}>{{ $category->category }}</option>
                              @endforeach
                           </select>
                        </div>

                        <div class="form-group">
                           <label>عکس</label>
                           <input type="file" name="image" class="form-control" />
                        </div>

                        <div class="form-group">
                           <label>توضیحات</label>
                           <textarea id="mytextarea" name="description">
                              {{ $category->description }}
                           </textarea>
                        </div>


                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
