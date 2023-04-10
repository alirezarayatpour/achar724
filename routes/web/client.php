<?php

use App\Http\Controllers\Frontend\ClientController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->controller(ClientController::class)->group(function () {
   Route::get('/', 'index')->name('pages.index');
   Route::get('/about', 'about')->name('pages.about');
   Route::get('/all-category/{category}', 'all_category')->name('pages.all-category');
   Route::get('/category/{category}', 'category')->name('pages.category');
   Route::get('/best-seller', 'best_seller')->name('pages.best-seller');
   Route::get('/blogs', 'blogs')->name('pages.blogs');
   Route::get('/blog/{blog}', 'blog')->name('pages.blog');
   Route::get('/gallery', 'gallery')->name('pages.gallery');
   Route::get('/permissions', 'permissions')->name('pages.permissions');
   Route::get('/sale', 'sale')->name('pages.sale');
   Route::get('/video', 'video')->name('pages.video');
   Route::get('/worked', 'worked')->name('pages.worked');
   Route::get('/product/{product}', 'product')->name('pages.product');
   Route::get('/cart-1', 'cart_1')->name('pages.cart-1');
   Route::get('/cart-2', 'cart_2')->name('pages.cart-2');

   //! Cart 
   Route::post('/add-to-cart/{product}', 'add_to_cart')->name('add-to-cart');
   Route::post('/cart-plus/{cart}', 'cart_plus')->name('cart-plus');
   Route::post('/cart-minus/{cart}', 'cart_minus')->name('cart-minus');
   Route::post('/cart-remove/{cart}', 'cart_remove')->name('cart-remove');

   //! Account
   Route::get('/my-account', 'myAccount')->name('pages.my-account'); 
   Route::get('/my-account/edit-account', 'edit_account')->name('pages.edit-account');
   Route::get('/my-account/my-favorite', 'favorite')->name('pages.my-favorite');
   Route::get('/my-account/my-suggest', 'suggest')->name('pages.my-suggest');
   Route::post('/add-to-favorite/{product}', 'add_to_favorite')->name('add-to-favorite');
   Route::post('/remove-favorite/{favorite}', 'remove_favorite')->name('remove-favorite');

   Route::post('/change/{user}', 'change')->name('change');
   Route::post('/worked-form', 'worked_form')->name('worked-form');
   Route::post('/news-request', 'news_request')->name('news-request');
   Route::post('/about-form', 'about_form')->name('about-form');
   Route::post('/blog-comment/{blog}', 'blog_comment')->name('blog-comment');
   Route::post('/ask-comment/{product}', 'ask_comment')->name('ask-comment');
   Route::post('/product-comment/{product}', 'product_comment')->name('product-comment');
});
