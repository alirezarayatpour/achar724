@extends('admin.layouts.app')
@section('title', 'محصولات')
@section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                     <label class="form-label">عنوان</label>
                     <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title') }}" placeholder="عنوان محصول را وارد کنید">
                     @error('title')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">ویژگی</label>
                     <input type="text" class="form-control @error('feature') is-invalid @enderror" name="feature"
                        value="{{ old('feature') }}" placeholder="ویژگی محصول را وارد کنید">
                     @error('feature')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">توضیحات محصول</label>
                     <textarea id="mytextarea" name="description" class="@error('description') is-invalid @enderror">
                        {{ old('description') }}
                     </textarea>
                     @error('description')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">تعداد</label>
                     <input type="number" class="form-control @error('storage') is-invalid @enderror" name="storage"
                        value="{{ old('storage') }}" placeholder="تعداد محصول را وارد کنید">
                     @error('storage')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">قیمت</label>
                     <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}" placeholder="قیمت محصول را وارد کنید">
                     @error('price')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">تخفیف</label>
                     <input type="text" class="form-control @error('sale') is-invalid @enderror" name="sale"
                        value="{{ old('sale') }}" placeholder="تخفیف محصول را وارد کنید">
                     @error('sale')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">کاور</label>
                     <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover">
                     @error('cover')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">گالری عکس محصول</label>
                     <input type="file" name="images[]" class="form-control" multiple>
                     @error('images[]')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">وزن محصول</label>
                     <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight"
                        value="{{ old('weight') }}" placeholder="وزن محصول را وارد کنید">
                     @error('weight')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">حداکثر ظرفیت</label>
                     <input type="text" class="form-control @error('capacity') is-invalid @enderror" name="capacity"
                        value="{{ old('capacity') }}" placeholder="حداکثر ظرفیت محصول را وارد کنید">
                     @error('capacity')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب موقعیت</label>
                     <select name="position" id="position"
                        class="form-control @error('position') is-invalid @enderror">
                        <option disabled selected>انتخاب موقعیت</option>
                        <option value="پیشنهاد ویژه">پیشنهاد ویژه</option>
                        <option value="پیشنهاد کیاصنعت">پیشنهاد کیاصنعت</option>
                        <option value="پرفروش‌ها">پرفروش‌ها</option>
                     </select>
                     @error('position')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب دسته‌بندی</label>
                     <select name="category_id" id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option disabled selected>انتخاب دسته‌بندی</option>
                        @foreach($categories as $category)
                           @if($category->parent_id != 0)
                              <option value="{{ $category->id }}">{{ $category->category }}</option>
                           @endif
                        @endforeach
                     </select>
                     @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب موقعیت</label>
                     <select name="brand" id="brand"
                        class="form-control @error('brand') is-invalid @enderror">
                        <option disabled selected>انتخاب برند</option>
                        @foreach ($brand as $item)
                           <option value="{{ $item->name }}">{{ $item->name }}</option> 
                        @endforeach
                        <option value="متفرقه">متفرقه</option>
                     </select>
                     @error('brand')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <button type="submit" class="btn btn-success">ایجاد</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
