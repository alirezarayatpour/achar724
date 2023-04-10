{{-- ! aside --}}
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('index') }}" aria-expanded="false">
                     <i class="bi bi-speedometer"></i>
                     <span class="hide-menu">داشبورد</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('category.index') }}" aria-expanded="false">
                     <i class="bi bi-tag"></i>
                     <span class="hide-menu">دسته‌بندی‌ها</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('blog.index') }}" aria-expanded="false">
                     <i class="bi bi-journal-text"></i>
                     <span class="hide-menu">وبلاگ</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('brand.index') }}" aria-expanded="false">
                     <i class="fa fa-handshake"></i>
                     <span class="hide-menu">برند</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('product.index') }}" aria-expanded="false">
                     <i class="bi bi-cart-plus"></i>
                     <span class="hide-menu">محصولات</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('suggest.index') }}" aria-expanded="false">
                     <i class="bi bi-cart-plus"></i>
                     <span class="hide-menu">پیشنهاد محصولات</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('slider.index') }}" aria-expanded="false">
                     <i class="bi bi-sliders2"></i>
                     <span class="hide-menu">مدیریت اسلایدر</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
                     <i class="bi bi-people"></i>
                     <span class="hide-menu">مدیریت کاربران</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('contact.index') }}" aria-expanded="false">
                     <i class="bi bi-phone"></i>
                     <span class="hide-menu">اطلاعات تماس</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                     <i class="bi bi-paperclip"></i>
                     <span class="hide-menu">مدیریت صفحات</span>
                  </a>
                  <ul aria-expanded="false" class="collapse first-level">
                     <li class="sidebar-item">
                        <a href="{{ route('gallery.index') }}" class="sidebar-link">
                           <i class="bi bi-camera"></i>
                           <span class="hide-menu"> گالری </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('video.index') }}" class="sidebar-link">
                           <i class="bi bi-camera-video"></i>
                           <span class="hide-menu"> ویدیو </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('permission.index') }}" class="sidebar-link">
                           <i class="bi bi-paperclip"></i>
                           <span class="hide-menu"> مجوزها </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('worked.index') }}" class="sidebar-link">
                           <i class="bi bi-pen"></i>
                           <span class="hide-menu"> دستگاه کارکرده </span>
                        </a>
                     </li>
                  </ul>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                     <i class="bi bi-folder"></i>
                     <span class="hide-menu">مدیریت فرم‌ها</span>
                  </a>
                  <ul aria-expanded="false" class="collapse first-level">
                     <li class="sidebar-item">
                        <a href="{{ route('contactForm.index') }}" class="sidebar-link">
                           <i class="bi bi-phone"></i>
                           <span class="hide-menu"> فرم تماس با ما </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('newsRequest.index') }}" class="sidebar-link">
                           <i class="bi bi-hand-thumbs-up"></i>
                           <span class="hide-menu"> فرم عضویت در خبرنامه </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('workedForm.index') }}" class="sidebar-link">
                           <i class="bi bi-pen-fill"></i>
                           <span class="hide-menu"> فرم ثبت دستگاه کارکرده </span>
                        </a>
                     </li>
                  </ul>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                     <i class="bi bi-pen-fill"></i>
                     <span class="hide-menu">مدیریت نظرات</span>
                  </a>
                  <ul aria-expanded="false" class="collapse first-level">
                     <li class="sidebar-item">
                        <a href="{{ route('blogComment.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> وبلاگ </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('productComment.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> محصولات </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('askComment.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> پرسش و پاسخ </span>
                        </a>
                     </li>
                  </ul>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                     <i class="bi bi-flag"></i>
                     <span class="hide-menu">مدیریت بنرها</span>
                  </a>
                  <ul aria-expanded="false" class="collapse first-level">
                     <li class="sidebar-item">
                        <a href="{{ route('home-banner.index') }}" class="sidebar-link">
                           <i class="bi bi-flag"></i>
                           <span class="hide-menu"> بنرهای صفحه اصلی </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('sale-banner.index') }}" class="sidebar-link">
                           <i class="bi bi-flag"></i>
                           <span class="hide-menu"> بنرهای صفحه تخفیفات </span>
                        </a>
                     </li>
                  </ul>
               </li>

                <li class="sidebar-item">
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                      <i class="bi bi-gear"></i>
                      <span class="hide-menu">تنظیمات</span>
                  </a>
                  <ul aria-expanded="false" class="collapse first-level">
                      <li class="sidebar-item">
                        <a href="{{ route('social.index') }}" class="sidebar-link">
                           <i class="bi bi-globe2"></i>
                           <span class="hide-menu"> شبکه‌های اجتماعی </span>
                        </a>
                      </li>
                      <li class="sidebar-item">
                        <a href="{{ route('logo.index') }}" class="sidebar-link">
                           <i class="bi bi-circle-fill"></i>
                           <span class="hide-menu"> لوگو </span>
                        </a>
                      </li>
                      <li class="sidebar-item">
                        <a href="{{ route('footer-column.index') }}" class="sidebar-link">
                           <i class="bi bi-circle-fill"></i>
                           <span class="hide-menu"> عنوان ستون‌های فوتر (Footer) </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('footer-text.index') }}" class="sidebar-link">
                           <i class="bi bi-circle-fill"></i>
                           <span class="hide-menu"> متن فوتر (Footer) </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                     <a href="{{ route('footer-item.index') }}" class="sidebar-link">
                        <i class="bi bi-circle-fill"></i>
                        <span class="hide-menu"> آیتم‌های فوتر (Footer) </span>
                     </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('header-item.index') }}" class="sidebar-link">
                           <i class="bi bi-circle-fill"></i>
                           <span class="hide-menu"> آیتم‌های هدر (Header) </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('question.index') }}" class="sidebar-link">
                           <i class="bi bi-circle-fill"></i>
                           <span class="hide-menu"> سوالات متداول </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('service.index') }}" class="sidebar-link">
                           <i class="bi bi-circle-fill"></i>
                           <span class="hide-menu"> خدمات </span>
                        </a>
                     </li>
                  </ul>
              </li>

               <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <i class="bi bi-box-arrow-right"></i>
                     <span class="hide-menu">خروج</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                  </form>
               </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
{{-- ! /aside --}}
