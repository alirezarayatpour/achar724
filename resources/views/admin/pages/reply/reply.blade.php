@extends('admin.layouts.app')
@section('title', 'پاسخ')
@section('content')
   <!-- ============================================================== -->
   <div class="row mt-3">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('reply.store', $askComment->id) }}" method="post" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                     <label>پاسخ</label>
                     <textarea id="mytextarea" name="reply" class=" @error('reply') is-invalid @enderror">
                        {{ old('reply') }}
                     </textarea>
                     @error('reply')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

               <button type="submit" class="btn btn-success mt-2">پاسخ</button>
            </form>
         </div>
      </div>
   </div>
    </div>
@endsection
