@extends('admin.layouts.app')
@section('title', 'اطلاعات تماس')
@section('content')
   <!-- ============================================================== -->
   <div class="row mt-3">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('contact.store') }}" method="post">
                  @csrf
                  <div class="form-group">
                     <label>آدرس</label>
                     <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address') }}" placeholder="آدرس را وارد کنید"/>
                     @error('address')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label>شماره تلفن</label>
                     <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}" placeholder="شماره تلفن را وارد کنید"/>
                     @error('phone')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label>شماره موبایل</label>
                     <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror"
                        value="{{ old('mobile') }}" placeholder="شماره موبایل را وارد کنید"/>
                     @error('mobile')
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
