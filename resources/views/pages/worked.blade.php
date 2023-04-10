@extends('layouts.app')
@section('css')
@endsection

@section('content')
{{--! Slider --}}
<div class="container">
   <div class="row">
      <div class="col-xl-12 col-12">
         @include('message.message')
      </div>
   </div>
</div>
<div class="container-fluid mt-1">
   <div class="container">
      <div class="row">
         <div class="col-xl-12 position-relative">

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
               <div class="carousel-indicators">
                  @foreach($slider as $item)
                     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
                  @endforeach
               </div>
               <div class="carousel-inner">
                  @foreach ($slider as $key=>$item)
                     <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('images/slider').'/'.$item->image }}" class="d-block w-100" alt="...">
                     </div>
                  @endforeach
               </div>
                 <i class="fa fa-arrow-circle-right prevous-icon" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"></i>
                 <i class="fa fa-arrow-circle-left next-icon" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"></i>
             </div>

         </div>
      </div>
   </div>
</div>
{{--! Slider --}}

{{--! Description --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            @foreach ($worked as $item)
               <h1>{{ $item->title }}</h1>
               <div class="product-description">{!! $item->description !!}</div>
            @endforeach
         </div>
      </div>
   </div>
</div>         
{{--! Description --}}

{{--! Form --}}
<div class="container-fluid mt-2">
   <div class="container">
      <form action="{{ route('worked-form') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="name" class="worked-form-label">نام و نام‌خانوادگی</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="text" class="worked-form-input @error('name') is-bad @enderror" name="name" 
                     placeholder="الزامی *" value="{{ old('name') }}"/>
                  <span class="text-danger">
                     @error('name')
                        {{ $message }}
                     @enderror
                  </span>
               </div>
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="phone" class="worked-form-label">شماره تماس</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="text" class="worked-form-input @error('phone') is-bad @enderror" name="phone" 
                     placeholder="الزامی *" value="{{ old('phone') }}"/>
                  <span class="text-danger">
                     @error('phone')
                        {{ $message }}
                     @enderror
                  </span>
               </div>
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="email" class="worked-form-label">آدرس ایمیل</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="email" class="worked-form-input" name="email" placeholder="اختیاری *" value="{{ old('email') }}"/>
               </div>
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="set" class="worked-form-label">نام دستگاه / قطعه</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="text" class="worked-form-input @error('set') is-bad @enderror" name="set" 
                     placeholder="الزامی *" value="{{ old('set') }}"/>
                  <span class="text-danger">
                     @error('set')
                        {{ $message }}
                     @enderror
                  </span>
               </div>
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="price" class="worked-form-label">قیمت پیشنهادی</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="text" class="worked-form-input @error('price') is-bad @enderror" name="price" 
                     placeholder="الزامی *" value="{{ old('price') }}"/>
                  <span class="text-danger">
                     @error('price')
                        {{ $message }}
                     @enderror
                  </span>
               </div>
            </div>

            <div class="col-xl-12 d-flex mt-4">
               <div class="worked-form-label-box-large">
                  <label for="address" class="worked-form-label">آدرس شما</label>
               </div>
               <div class="worked-form-input-box-large">
                  <input type="text" class="worked-form-input @error('address') is-bad @enderror" name="address" 
                     placeholder="الزامی *" value="{{ old('address') }}"/>
                  <span class="text-danger">
                     @error('address')
                        {{ $message }}
                     @enderror
                  </span>
               </div> 
            </div>

            <div class="col-xl-12 d-flex mt-4">
               <div class="worked-form-label-box-large">
                  <label for="description" class="worked-form-label">توضیحات</label>
               </div>
               <div class="worked-form-input-box-large">
                  <textarea class="worked-form-input" rows="5" name="description" placeholder="اختیاری *">{{ old('description') }}</textarea>
               </div>   
            </div>

            <div style="margin-top: 100px;"></div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="image" class="worked-form-label">تصویر دستگاه</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="file" name="image" class="worked-form-input @error('image') is-bad @enderror" />
                  <span class="text-danger">
                     @error('image')
                        {{ $message }}
                     @enderror
                  </span>
               </div>  
            </div>

            {{-- <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="" class="worked-form-label">تصویر دستگاه</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="file" class="worked-form-input" />
               </div>  
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="" class="worked-form-label">تصویر دستگاه</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="file" class="worked-form-input" />
               </div>  
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="" class="worked-form-label">تصویر دستگاه</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="file" class="worked-form-input" />
               </div>  
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="" class="worked-form-label">تصویر دستگاه</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="file" class="worked-form-input" />
               </div>  
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="" class="worked-form-label">تصویر دستگاه</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="file" class="worked-form-input" />
               </div>  
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="" class="worked-form-label">تصویر دستگاه</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="file" class="worked-form-input" />
               </div>  
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="" class="worked-form-label">تصویر دستگاه</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="file" class="worked-form-input" />
               </div>  
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="" class="worked-form-label">تصویر دستگاه</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="file" class="worked-form-input" />
               </div>  
            </div>

            <div class="col-xl-4 d-flex mt-4">
               <div class="worked-form-label-box">
                  <label for="" class="worked-form-label">کد امنیتی</label>
               </div>
               <div class="worked-form-input-box">
                  <input type="text" class="worked-form-input" />
               </div>  
            </div> --}}

            <div class="col-xl-4 mt-xl-4 mt-5">
               <button class="worked-form-button">ارسال درخواست</button>
            </div>

         </div>
      </form>
   </div>
</div>            
{{--! Form --}}
@endsection

@section('js')
@endsection