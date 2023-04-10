<html lang="fa" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   {{-- Style --}}
   <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('Frontend/css/all.css') }}">
   <link rel="stylesheet" href="{{ asset('Frontend/css/swiper-bundle.min.css') }}">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
   {{-- Style --}}

   @foreach ($logo as $item)
      @if ($item->position == 'favicon')
         <link rel="icon" href="{{ asset('images/logo').'/'.$item->image }}">
      @endif
   @endforeach
   <link rel="stylesheet" href="icon">

   @yield('css')

</head>
<body>

   {{--! Banner --}}
   <div class="w-100">
      @foreach ($homeBanner as $item)
         @if ($item->position == 'بالای صفحه')
            <a href="#">
               <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="w-100 d-block">
            </a>
         @endif
      @endforeach
   </div>
   {{--! Banner --}}

   @include('layouts.header')

   <div>
      @yield('content')
   </div>

   @include('layouts.footer')
    
   {{-- Script --}}
   <script src="{{ asset('Frontend/js/all.js') }}"></script>
   <script src="{{ asset('Frontend/js/jquery.js') }}"></script>
   <script src="{{ asset('Frontend/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('Frontend/js/swiper-bundle.min.js') }}"></script>
   <script src="{{ asset('Frontend/js/script.js') }}"></script>
   {{-- Script --}}

   @yield('js')
</body>
</html>