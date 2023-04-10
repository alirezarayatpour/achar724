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
                     <input type="text" class="form-control" name="title" value="{{ $product->title }}" >
                  </div>

                  <div class="form-group">
                     <label class="form-label">ویژگی</label>
                     <input type="text" class="form-control" name="feature" value="{{ $product->feature }}" >
                  </div>

                  <div class="form-group">
                     <label class="form-label">توضیحات محصول</label>
                     <textarea id="mytextarea" name="description" class="">
                        {{ $product->description }}
                     </textarea>
                  </div>

                  <div class="form-group">
                     <label class="form-label">تعداد</label>
                     <input type="number" class="form-control" name="storage" value="{{ $product->storage }}">
                  </div>

                  <div class="form-group">
                     <label class="form-label">قیمت</label>
                     <input type="text" class="form-control" name="price" value="{{ $product->price }}" >
                  </div>

                  <div class="form-group">
                     <label class="form-label">تخفیف</label>
                     <input type="text" class="form-control" name="sale" value="{{ $product->sale }}" >
                  </div>

                  <div class="form-group">
                     <label class="form-label">کاور</label>
                     <input type="file" class="form-control" name="cover">
                  </div>

                  <div class="form-group">
                     <label class="form-label">گالری عکس محصول</label>
                     <input type="file" name="images[]" class="form-control" multiple>
                  </div>

                  <div class="form-group">
                     <label class="form-label">وزن محصول</label>
                     <input type="text" class="form-control" name="weight" value="{{ $product->weight }}">
                  </div>

                  <div class="form-group">
                     <label class="form-label">حداکثر ظرفیت</label>
                     <input type="text" class="form-control" name="capacity" value="{{ $product->capacity }}">
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب موقعیت</label>
                     <select name="position" id="position" class="form-control">
                        <option value="{{ $product->position }}">{{ $product->position }}</option>
                        <option value="پیشنهاد ویژه">پیشنهاد ویژه</option>
                        <option value="پیشنهاد کیاصنعت">پیشنهاد کیاصنعت</option>
                        <option value="پرفروش‌ها">پرفروش‌ها</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب دسته‌بندی</label>
                     <select name="category_id" id="category_id" class="form-control">
                        <option value="{{ $product->category_id }}">{{ $product->category->category }}</option>
                        @foreach($categories as $category)
                           @if($category->parent_id != 0)
                              <option value="{{ $category->id }}">{{ $category->category }}</option>
                           @endif
                        @endforeach
                     </select>
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب برند</label>
                     <select name="category_id" id="category_id" class="form-control">
                        <option value="{{ $product->brand }}">{{ $product->brand }}</option>
                        @foreach($brand as $item)
                           <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                        <option value="متفرقه">متفرقه</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <button type="submit" class="btn btn-success">ویرایش</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
