{{--! Footer --}}
<div class="container-fluid mt-5 bgcolor-silver">
   <div class="container">
      <div class="row">
         <div class="py-4">
            @foreach ($logo as $item)
               @if ($item->position == 'منو پایین')
                  <img src="{{ asset('images/logo').'/'.$item->image }}" alt="" class="logo-footer">
               @endif
            @endforeach
         </div>
         <div class="col-xl-5">
            @foreach ($footerColumn as $item)
               @if ($item->position == 'ستون اول')
                  <h4 class="footer-title">{{ $item->title }}</h4>
               @endif
            @endforeach
            <div class="footer-text">
               @foreach ($footerText as $item)
                  {!! $item->text !!}
               @endforeach
            </div>
         </div>
         <div class="col-xl-1"></div>
         <div class="col-xl-2">
            @foreach ($footerColumn as $item)
               @if ($item->position == 'ستون دوم')
                  <h4 class="footer-title">{{ $item->title }}</h4>
               @endif
            @endforeach
            <ul class="footer-links">
               @foreach ($footerItem as $item)
                  <li><a href="{{ route('pages.'.$item->link) }}">{{ $item->item }}</a></li>
               @endforeach
            </ul>
         </div>
         <div class="col-xl-4">
            @foreach ($footerColumn as $item)
               @if ($item->position == 'ستون سوم')
                  <h4 class="footer-title">{{ $item->title }}</h4>
               @endif
            @endforeach
            <ul class="footer-links">
               <li>
                  <i class="bi bi-geo-alt text-red"></i>
                  @foreach ($contact as $item)
                     {{ $item->address }}
                  @endforeach
               </li>
               <li class="d-flex">
                  <i class="bi bi-telephone text-red ms-1"></i>
                  <a href="tel:@foreach ($contact as $item){{ $item->phone }}@endforeach">
                     @foreach ($contact as $item)
                        {{ $item->phone }}
                     @endforeach
                  </a>
               </li>
               <li class="d-flex">
                  <i class="bi bi-phone text-red ms-1"></i>
                  <a href="tel:@foreach ($contact as $item){{ $item->mobile }}@endforeach">
                     @foreach ($contact as $item)
                        {{ $item->mobile }}
                     @endforeach
                  </a>
               </li>
            </ul>
            <h5 class="text-black">درخواست عضویت در خبرنامه</h5>
            <form action="{{ route('news-request') }}" class="w-100" method="POST">
               @csrf
               <input type="text" name="email" id="email" class="news-request" placeholder="آدرس ایمیل">
               <button class="news-button">ثبت درخواست</button>
            </form>
            <div class="d-flex align-items-end justify-content-end mt-3">
               @foreach ($social as $item)
                  <a href="https://{{ $item->link }}"><i class="{{ $item->icon }} fa-2x text-red"></i></a>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
{{--! Footer --}} 