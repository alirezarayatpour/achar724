@extends('admin.layouts.app')
@section('title', 'محصولات')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">

               <div class="table-responsive">
                  <table class="table">
                     <tr>
                        <td>نام</td>
                        <td scope="row">{{ $workedForm->name }}</td>
                     </tr>
                     <tr>
                        <td>شماره</td>
                        <td scope="row">{{ $workedForm->phone }}</td>
                     </tr>
                     <tr>
                        <td>ایمیل</td>
                        <td scope="row">{{ $workedForm->email }}</td>
                     </tr>
                     <tr>
                        <td>نام دستگاه</td>
                        <td scope="row">{{ $workedForm->set }}</td>
                     </tr>
                     <tr>
                        <td>قیمت</td>
                        <td scope="row">{{ number_format($workedForm->price) }} تومان</td>
                     </tr>
                     <tr>
                        <td>آدرس</td>
                        <td scope="row">{{ $workedForm->address }}</td>
                     </tr>
                     <tr>
                        <td>توضیحات</td>
                        <td scope="row">
                           @if($workedForm->description)
                              {!! $workedForm->description !!}
                           @else
                              <span class="text-danger">ندارد</span>   
                           @endif   
                        </td>
                     </tr>
                     <tr>
                        <td>تصویر محصول</td>
                        <td>
                           <img src="{{ asset('images/worked') . '/' . $workedForm->image }}" alt="" width="300px" height="150px">
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <form action="{{ route('workedForm.destroy', $workedForm->id) }}" method="post">
                              @csrf
                              <button class="btn btn-danger">حذف</button>
                           </form>
                        </td>
                     </tr>
                  </table>
               </div>

            </div>
         </div>
      </div>
   </div>
@endsection
