{{--! Header --}}
<div class="container-fluid mt-3">
   <div class="container">
      <div class="row">
         <div class="col-xl-2 col-6 order-0 order-xl-0">
            <a href="{{ route('pages.index') }}">
               @foreach ($logo as $item)
                  @if ($item->position == 'منو بالا')
                     <img src="{{ asset('images/logo').'/'.$item->image }}" alt="" class="logo">
                  @endif
               @endforeach
            </a>
         </div>
         <div class="col-xl-6 col-12 order-2 order-xl-1">
            <form action="" class="search-bar">
               <button><i class="fa fa-search text-muted"></i></button>
               <input type="text" placeholder="جستجو">
            </form>
         </div>
         <div class="col-xl-4 col-6 order-xl-2 order-1 d-flex align-items-center justify-content-end">
            @if(Auth::user())
               <a href="{{ route('pages.my-account') }}">
                  <i class="bi bi-person-plus-fill icon" role="button"></i>
               </a>
            @else
               <a href="{{ route('login') }}">
                  <i class="bi bi-person-plus-fill icon" role="button"></i>
               </a>
            @endif
            <a href="{{ route('pages.cart-1') }}">
               <i class="bi bi-cart-fill icon cart-btn" role="button"></i>
            </a>
         </div>
      </div>
   </div>
</div>

<div class="container-fluid mt-3 mb-xl-0 mb-3">
   <div class="container">
      <div class="row">

         <div class="col-xl-2 col-6 position-relative category-drop">
            <div class="category-btn">
               <li class="open-category">
                  <i class="fa fa-bars ms-2 category-btn-icon" role="button"></i>
                  <a href="javascript:void(0)">دسته‌بندی محصولات</a>
               </li>
            </div>
            <div class="category-mobile">
               <div class="dropdown-category">
                  <ul class="dropdown-category-item">
                     @foreach ($categories as $category)
                        <li class="mehrdad open">
                           <span>
                              <i class="fa fa-gear gear-icon ms-2"></i>
                              <a href="{{ route('pages.all-category', $category->id) }}">{{ $category->category }}</a>
                              <i class="bi bi-caret-left ms-2 arrow"></i>
                           </span>
                           <ul class="dropdown-category-item-children">
                              @foreach ($parameters as $parameter)
                                 @if($category->id == $parameter->parent_id)
                                    <li>
                                       <i class="fa fa-gear gear-icon ms-2"></i>
                                       <a href="{{ route('pages.category', $parameter->id) }}">{{ $parameter->category }}</a>
                                    </li>
                                 @endif
                              @endforeach
                           </ul>
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>

         <div class="col-xl-8 col-6">
            <span class="open-nav">دسترسی سریع<i class="fa fa-bars me-2" role="button"></i></span>
            <div class="nav-mobile">
               <ul class="nav-menu">
                  @foreach ($headerItem as $item)
                     <li>
                        <i class="{{ $item->icon }} ms-2"></i>
                        <a href="{{ route('pages'.'.'.$item->link) }}">{{ $item->item }}</a>
                     </li>
                  @endforeach
               </ul>
            </div>
         </div>

         <div class="col-xl-2 text-start deliver-tehran">
            <i class="bi bi-geo-alt"></i>
            <span>ارسال رایگان به تهران</span>
         </div>

      </div>
   </div>
</div>
{{--! Header --}}
<div class="back-close"></div>

<script>
let openMenu = document.querySelectorAll('.arrow');

openMenu.forEach(function(value){
   value.addEventListener('click', function(e){
      let job = e.target.parentElement.parentElement;
      job.classList.toggle('active');
   });
});
</script>