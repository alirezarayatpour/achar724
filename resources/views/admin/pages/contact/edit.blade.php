@extends('admin.layouts.app')
@section('title', 'اطلاعات تماس')
@section('content')
   <!-- ============================================================== -->
   <div class="row mt-3">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('contact.update', $contact->id) }}" method="post">
                  @csrf
                  <div class="form-group">
                     <label>آدرس</label>
                     <input type="text" name="address" class="form-control" value="{{ $contact->address }}" />
                  </div>

                  <div class="form-group">
                     <label>شماره تلفن</label>
                     <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" />
                  </div>

                  <div class="form-group">
                     <label>شماره موبایل</label>
                     <input type="text" name="mobile" class="form-control" value="{{ $contact->mobile }}"/>
                  </div>

                  <button type="submit" class="btn btn-success mt-2">ویرایش</button>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
