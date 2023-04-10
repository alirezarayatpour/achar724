@extends('admin.layouts.app')
@section('title', 'اطلاعات تماس')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-md-12">

         @include('message.message')

         <a href="{{ route('contact.create') }}" class="btn btn-primary">ایجاد</a>

         <div class="card mt-2">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table text-center">
                     <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">آدرس</th>
                        <th scope="col">شماره تلفن</th>
                        <th scope="col">شماره موبایل</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">حذف</th>
                        <th scope="col">ویرایش</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($contacts as $contact)
                        <tr>
                           <th scope="row">{{ $contact->id }}</th>
                           <td>{{ $contact->address }}</td>
                           <td>{{ $contact->phone }}</td>
                           <td>{{ $contact->mobile }}</td>

                           @switch($contact->status)
                              @case(0)
                              @php
                                 $url = route('contact.status', $contact->id);
                                 $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                              @endphp
                              @break

                              @case(1)
                              @php
                                 $url = route('contact.status', $contact->id);
                                 $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                              @endphp
                              @break
                           @endswitch

                           <td>{!! $status !!}</td>
                           <td>
                              <form action="{{ route('contact.destroy', $contact->id) }}" method="post">
                                 @csrf
                                 <button class="btn btn-danger">حذف</button>
                              </form>
                           </td>
                           <td><a href="{{ route('contact.edit', $contact->id) }}"
                                  class="btn btn-primary mr-2">ویرایش</a></td>
                        </tr>
                     @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
