@extends('admin.layouts.app')
@section('title', 'فرم تماس')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mt-2">نام: {{ $contactForm->name }}</h4>
                    <h4 class="card-title mt-2">ایمیل: {{ $contactForm->email }}</h4>
                    <h4 class="card-title mt-2">شماره تماس: {{ $contactForm->phone }}</h4>
                    <h4 class="card-title mt-2">موضوع: {{ $contactForm->subject }}</h4>
                    <div class="card-text mt-3">متن پیام: {!! $contactForm->body !!}</div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
