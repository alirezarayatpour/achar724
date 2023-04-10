@extends('layouts.app')
@section('css')
@endsection

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col-xl-12">
         <h3 class="product-titr">حساب کاربری</h3>
      </div>
   </div>
</div>

<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-3">
            @include('layouts.aside')
         </div>
         <div class="col-xl-9">
            @if ($favorite->count() > 0)
               <table class="table table-responsive shadow text-center align-middle">
                  {{-- <tr>
                     <td>تصویر محصول</td>
                     <td>نام محصول</td>
                     <td>بازدید از صفحه</td>
                     <td>حذف محصول</td>
                  </tr> --}}
                  @foreach ($favorite as $item)
                     <tr>
                        <td>
                           <img src="{{ asset('image/cover').'/'.$item->product->cover }}" alt="" width="50px" height="50px">
                        </td>
                        <td class="favorite-name">{{ $item->product->title }}</td>
                        <td>
                           <a href="{{ route('pages.product', $item->product->id) }}" class="favorite-link">
                           بازدید از صفحه
                           </a>
                        </td>
                        <td>
                           <form action="{{ route('remove-favorite', $item->id) }}" method="POST">
                              @csrf
                              <button class="favorite-delete">حذف از لیست علاقه‌مندی‌ها</button>
                           </form>
                        </td>
                     </tr>
                  @endforeach 
               </table>
            @else
               هیچ لیست علاقه‌مندی وجود ندارد        
            @endif
         </div>
      </div>
   </div>
</div>

@endsection

@section('js')
@endsection