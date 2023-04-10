<?php

namespace App\Providers;

use App\Models\Backend\logo;
use App\Models\Backend\Brand;
use App\Models\Backend\Social;
use App\Models\Backend\Contact;
use App\Models\Backend\Category;
use App\Models\Backend\FooterItem;
use App\Models\Backend\FooterText;
use App\Models\Backend\HeaderItem;
use App\Models\Backend\HomeBanner;
use App\Models\Backend\FooterColumn;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
   /**
    * Register any application services.
    *
    * @return void
    */
   public function register()
   {
      //
   }

   /**
    * Bootstrap any application services.
    *
    * @return void
    */
   public function boot()
   {
      $homeBanner = HomeBanner::where('status', '1')->get();
      $social = Social::query()->where('status', '1')->get();
      $logo = logo::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $brand = Brand::query()->where('status', '1')->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $contact = Contact::query()->where('status', '1')->get();

      View::share('homeBanner', $homeBanner);
      View::share('social', $social);
      View::share('logo', $logo);
      View::share('footerColumn', $footerColumn);
      View::share('footerText', $footerText);
      View::share('footerItem', $footerItem);
      View::share('headerItem', $headerItem);
      View::share('brand', $brand);
      View::share('categories', $categories);
      View::share('parameters', $parameters);
      View::share('contact', $contact);
   }
}
