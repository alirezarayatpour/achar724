<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require_once 'web/client.php';
require_once 'web/index.php';
require_once 'web/blog.php';
require_once 'web/slider.php';
require_once 'web/home-banner.php';
require_once 'web/sale-banner.php';
require_once 'web/social.php';
require_once 'web/logo.php';
require_once 'web/footer-column.php';
require_once 'web/footer-text.php';
require_once 'web/footer-item.php';
require_once 'web/header-item.php';
require_once 'web/brand.php';
require_once 'web/category.php';
require_once 'web/product.php';
require_once 'web/gallery.php';
require_once 'web/permission.php';
require_once 'web/video.php';
require_once 'web/question.php';
require_once 'web/suggest.php';
require_once 'web/user.php';
require_once 'web/contact.php';
require_once 'web/blogComment.php';
require_once 'web/productComment.php';
require_once 'web/askComment.php';
require_once 'web/reply.php';
require_once 'web/worked.php';
require_once 'web/contactForm.php';
require_once 'web/newsRequest.php';
require_once 'web/workedForm.php';
require_once 'web/service.php';