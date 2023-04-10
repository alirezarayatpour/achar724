<h5>حساب کاربری</h5>
<hr>
<ul class="my-account-list">
   <li>
      <a href="{{ route('pages.my-account') }}"
         class="{{ Request::route()->getName() == 'pages.my-account' ? 'active' : '' }}">پیشخوان</a>
   </li>
   <li>
      <a href="{{ route('pages.my-favorite') }}"
         class="{{ Request::route()->getName() == 'pages.my-favorite' ? 'active' : '' }}">لیست علاقه‌مندی‌ها</a>
   </li>
   <li>
      <a href="{{ route('pages.edit-account') }}"
         class="{{ Request::route()->getName() == 'pages.edit-account' ? 'active' : '' }}">ویرایش اطلاعات</a>
   </li>
   @if (auth()->user()->role == 3)
   <li>
      <a href="{{ route('pages.my-suggest') }}"
         class="{{ Request::route()->getName() == 'pages.my-suggest' ? 'active' : '' }}">افزودن محصول</a>
   </li>
   @endif
   <li>
      <a href="{{ route('logout') }}" class=""
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
         </form>
         خروج
      </a>
   </li>
</ul>
