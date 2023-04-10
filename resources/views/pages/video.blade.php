@extends('layouts.app')
@section('css')
@endsection

@section('content')
{{--! Titr --}}
<div class="container-fluid">
   <div class="container">
      <div class="row d-flex bg-purple">
         <div class="col-xl-8 col-lg-6 col-md-6 col-12 everything-center">
            <h1 class="gallery-title">گالری ویدیوهای برگزیده کیا صنعت</h1>
         </div>
         <div class="col-xl-4 col-lg-6 col-md-6 col-12">
            <img src="{{ asset('Frontend/img/video.JPG') }}" alt="" class="img-fluid video-image">
         </div>
      </div>
   </div>
</div>
{{--! Titr --}}

{{--! Description --}}
<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <h1>فیلم‌های مرتبط با حضور در نمایشگاه‌های بین‌المللی</h1>
            <p class="product-description">
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
{{--! Description --}}

{{--! Video --}}
<div class="container-fluid mt-5">
   <div class="container">
      @foreach ($video as $item)
         <div class="row">
            <div class="col-xl-4">
               <h4>{{ $item->title }}</h4>
               <div class="product-description">{!! $item->description !!}</div>
            </div>
            <div class="col-xl-8">
               <div class="bg-video-1">
                  <div>
                     <video src="{{ asset('videos/video').'/'.$item->video }}" class="video" controls></video>
                  </div>
               </div>
            </div>
         </div>
      @endforeach
   </div>
</div>         

{{-- <div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-8">
            <div class="bg-video-2">
               <div>
                  <video src="{{ asset('Frontend/video/canada1.mp4') }}" class="video" controls></video>
               </div>
            </div>
         </div>
         <div class="col-xl-4">
            <h4>آموزش بالانس چرخ‌ها</h4>
            <p class="product-description">
               لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
                و با استفاده از طراحان گرافیک است، چاپگرها 
                و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
                و با استفاده از طراحان گرافیک است، چاپگرها 
                و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
                و با استفاده از طراحان گرافیک است، چاپگرها 
                و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
            </p>
         </div>
      </div>
   </div>
</div>        

<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-4">
            <h4>آموزش بالانس چرخ‌ها</h4>
            <p class="product-description">
               لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
                و با استفاده از طراحان گرافیک است، چاپگرها 
                و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
                و با استفاده از طراحان گرافیک است، چاپگرها 
                و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
                و با استفاده از طراحان گرافیک است، چاپگرها 
                و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
            </p>
         </div>
         <div class="col-xl-8">
            <div class="bg-video-3">
               <div>
                  <video src="{{ asset('Frontend/video/canada1.mp4') }}" class="video" controls></video>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>  --}}

<div class="container-fluid mt-5">
   <div class="container">
      <div class="row">
         <div class="col-xl-9">
            <hr>
         </div>
         <div class="col-xl-3">
            <a href="" class="text-center more-content">مشاهده مطالب بیشتر</a>
         </div>
      </div>
   </div>
</div>        
{{--! Video --}}
@endsection

@section('js')
@endsection