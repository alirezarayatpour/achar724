@extends('layouts.app')
@section('css')
@endsection

@section('content')

{{--! Content --}}
<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">
         <div class="col-xl-12 p-3 position-relative">
            <div class="bgcolor-yellow"></div>
            <h1>درباره کیا صنعت</h1>
            <p class="about-titr">
               لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
               و با استفاده از طراحان گرافیک است، چاپگرها 
               و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط 
               فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
               می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان
               جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان 
               رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد،
               در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها،
               و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی،
               و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </p>
         </div>
      </div>
   </div>
</div>

<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <h3 class="text-center text-black">داستانِ ما</h3>
            <div class="position-relative">
               <div class="about-line"></div>
               <i class="bi bi-clock about-clock-icon"></i>
            </div>

            <p class="about-description">
               لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
               و با استفاده از طراحان گرافیک است، چاپگرها 
               و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط 
               فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
               می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان
               جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان 
               رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد،
               در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها،
               و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی،
               و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </p>

            <video src="{{ asset('Frontend/video/canada1.mp4') }}" class="video" controls></video>
         </div>
      </div>
   </div>
</div>      

<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-3 col-lg-4 col-md-4">
            <img src="{{ asset('Frontend/img/Iran_Counties.png') }}" alt="" class="img-fluid">
         </div>
         <div class="col-xl-9 col-lg-8 col-md-8">
            <h4 class="text-black">ارسال محصول به سراسر کشور</h4>
            <p class="about-description">
               لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
               و با استفاده از طراحان گرافیک است، چاپگرها 
               و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط 
               فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
               می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان
               جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان 
               رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد،
               در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها،
               و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی،
               و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </p>
            <h4 class="text-black">ارسال کلیه سفارشات به روش‌های زیر امکان‌پذیر است</h4>
            <ul class="d-inline-flex">
               <li class="ms-5">
                  <i class="bi bi-check2-square ms-1 text-red"></i>
                  <span class="about-description">پست</span>
               </li>
               <li class="ms-5">
                  <i class="bi bi-check2-square ms-1 text-red"></i>
                  <span class="about-description">تیپاکس</span>
               </li>
               <li class="ms-5">
                  <i class="bi bi-check2-square ms-1 text-red"></i>
                  <span class="about-description">باربری</span>
               </li>
            </ul>    
         </div>
      </div>
   </div>
</div>

<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-9 position-relative">
            <div class="bgcolor-red"></div>
            <div class="p-3">
               <h4 class="text-white">با ما در ارتباط باشید</h4>
               <form action="{{ route('about-form') }}" method="POST">
                  @csrf
                  <div class="row">
                     <div class="col-xl-2 col-4 mt-3">
                        <label for="name" class="about-form-label">نام و نام‌خانوادگی</label>
                     </div>
                     <div class="col-xl-4 col-8 mt-3">
                        <input type="text" class="about-form-input" name="name"/>
                     </div>

                     <div class="col-xl-2 col-4 mt-3">
                        <label for="email" class="about-form-label">آدرس ایمیل</label>
                     </div>
                     <div class="col-xl-4 col-8 mt-3">
                        <input type="email" class="about-form-input" name="email"/>
                     </div>

                     <div class="col-xl-2 col-4 mt-3">
                        <label for="phone" class="about-form-label">شماره تماس</label>
                     </div>
                     <div class="col-xl-4 col-8 mt-3">
                        <input type="text" class="about-form-input" name="phone"/>
                     </div>

                     <div class="col-xl-2 col-4 mt-3">
                        <label for="subject" class="about-form-label">موضوع پیام</label>
                     </div>
                     <div class="col-xl-4 col-8 mt-3">
                        <input type="text" class="about-form-input" name="subject"/>
                     </div>

                     <div class="col-xl-2 col-4 mt-3">
                        <label for="body" class="about-form-label">متن پیام</label>
                     </div>
                     <div class="col-xl-10 col-8 mt-3">
                        <textarea class="about-form-input" rows="8" name="body"></textarea>
                     </div>

                     <div class="col-xl-12 mt-3 justify-content-start">
                        <button class="comment-form-button">ارسال پیام</button>
                     </div>
         
                  </div>
               </form>
            </div>
         </div>

         <div class="col-xl-3">
            <h4 class="text-black">دیگر راه‌های ارتباطی</h4>
            <p class="about-titr">
               لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
               و با استفاده از طراحان گرافیک است، چاپگرها 
               و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط 
               فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
            </p> 
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
         </div>
      </div>
   </div>
</div>

<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">
         <h3 class="text-center text-black">سوالات متداول</h3>
         <div class="position-relative">
            <div class="about-line"></div>
            <i class="bi bi-question-circle about-question-icon"></i>
         </div>

         <div class="col-xl-12 border-right-question-box">
            
            <div class="accordion" id="accordionExample" style="border-radius: 10px;">

               @foreach ($question as $item)
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingOne">
                        <i class="bi bi-plus my-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $item->id }}" aria-expanded="true" aria-controls="collapseOne">
                           {{ $item->question }}
                        </i>
                     </h2>
                     <div id="collapse-{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           {!! $item->answer !!}
                        </div>
                     </div>
                  </div>
               @endforeach
               
            </div>

         </div>
      </div>
   </div>
</div>      
{{--! Content --}}

@endsection

@section('js')
@endsection