<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Favorite;
use App\Models\Backend\Blog;
use App\Models\Backend\Cart;
use Illuminate\Http\Request;
use App\Models\Backend\Image;
use App\Models\Backend\Reply;
use App\Models\Backend\Video;
use App\Models\Backend\Slider;
use App\Models\Backend\Worked;
use App\Models\Backend\Gallery;
use App\Models\Backend\Product;
use App\Models\Backend\Suggest;
use App\Models\Backend\Category;
use App\Models\Backend\Question;
use App\Models\Backend\AskComment;
use App\Models\Backend\HomeBanner;
use App\Models\Backend\SaleBanner;
use App\Models\Backend\WorkedForm;
use App\Models\Backend\BlogComment;
use App\Models\Backend\ContactForm;
use App\Models\Backend\NewsRequest;
use App\Models\Backend\Permissions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Backend\ProductComment;
use App\Models\Backend\Service;
use App\Models\Backend\Suggest as BackendSuggest;

class ClientController extends Controller
{
   public function index()
   {
      $slider = Slider::query()->orderBy('id', 'DESC')->where('status', '1')->where('position', '1')->get();
      $blog = Blog::query()->orderBy('id', 'DESC')->where('status', '1')->paginate(8);
      $homeBanner = HomeBanner::where('status', '1')->get();
      $products = Product::query()->where('status', '1')->paginate(8);
      $productComment = ProductComment::query()->get();
      $service = Service::where('status', '1')->get();

      return view('pages.index', compact('blog', 'slider', 'homeBanner', 'products', 'productComment', 'service'));
   }

   //!

   public function about()
   {
      $question = Question::query()->where('status', '1')->get();

      return view('pages.about', compact('question'));
   }

   //!

   public function all_category(Category $category)
   {
      $blog = Blog::query()->orderBy('id', 'DESC')->where('status', '1')->paginate(8);
      $slider = Slider::query()->orderBy('id', 'DESC')->where('status', '1')->where('position', '3')->get();
      $products = Product::query()->where('status', '1')->paginate(8);

      return view('pages.all-category', compact('blog', 'slider', 'category', 'products'));
   }

   //!

   public function category(Category $category, Product $product)
   {
      $category_parent_id = $category->parent_id;
      $paras = Category::where('id', 'LIKE', $category_parent_id)->get();
      $products = Product::query()->where('status', '1')->get();
      $productComment = ProductComment::query()->get();
      $specialProduct = Product::query()->where('status', '1')->paginate(1);

      return view('pages.category', compact('category', 'paras', 'products', 'productComment', 'specialProduct'));
   }

   //!

   public function best_seller(Category $category)
   {
      $categories = Category::query()->where('parent_id', '0')->get();
      $products = Product::query()->where('status', '1')->get();
      $productComment = ProductComment::query()->get();

      return view('pages.best-seller', compact('categories', 'products', 'category', 'productComment'));
   }

   //!

   public function blog(Blog $blog)
   {
      $blogComment = BlogComment::query()->where('status', '1')->get();

      return view('pages.blog', compact('blog', 'blogComment'));
   }

   //!

   public function blogs()
   {
      $blogs = Blog::query()->orderBy('id', 'DESC')->where('status', '1')->get();

      return view('pages.blogs', compact('blogs'));
   }

   //!

   public function gallery()
   {
      $gallery = Gallery::query()->where('status', '1')->get();
      return view('pages.gallery', compact('gallery'));
   }

   //! 

   public function permissions()
   {
      $permission = Permissions::query()->where('status', '1')->get();
      return view('pages.permissions', compact('permission'));
   }

   //! 

   public function sale()
   {
      $saleBanner = SaleBanner::where('status', '1')->get();
      $products = Product::query()->where('status', '1')->paginate(8);
      $productComment = ProductComment::query()->get();

      return view('pages.sale', compact('saleBanner', 'products', 'productComment'));
   }

   //! 

   public function video()
   {
      $video = Video::query()->where('status', '1')->get();

      return view('pages.video', compact('video'));
   }

   //! 

   public function worked()
   {
      $slider = Slider::query()->orderBy('id', 'DESC')->where('status', '1')->where('position', '2')->get();
      $worked = Worked::query()->where('status', '1')->get();

      return view('pages.worked', compact('slider', 'worked'));
   }

   //! 

   public function product(Product $product, Suggest $suggest)
   {
      $images = Image::query()->get();
      $category = Category::query()->where('parent_id', '0')->get();
      $products = Product::query()->where('status', '1')->paginate(8);
      $suggest = Suggest::query()->where('status', '1')->get();
      $productComment = ProductComment::query()->where('status', '1')->get();
      $askComment = AskComment::query()->where('status', '1')->get();
      $replies = Reply::query()->get();
      $service = Service::where('status', '1')->get();

      return view('pages.product', compact('product', 'images', 'category', 'products', 'suggest', 
      'productComment', 'askComment', 'replies', 'service'));
   }

   //! 

   public function cart_1()
   {
      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.cart-1', compact('cart', 'totalPrice'));
   }

   //! 

   public function cart_2()
   {
      return view('pages.cart-2');
   }

   //!

   public function add_to_cart(Product $product)
   {
      if ($item = auth()->user()->cart->where('product_id', $product->id)->first()) {
         $item->increment('count');
      } else {
         auth()->user()->cart()->create([
            'product_id' => $product->id,
            'price' => $product->price,
         ]);
      }

      return redirect()->back();

      // dd($product);
   }

   //!

   public function cart_plus(Cart $cart)
   {
      $cart->increment('count');
      return back();
   }

   //!

   public function cart_minus(Cart $cart)
   {
      if ($cart->count < 2) {
         $cart->delete();
      } else {
         $cart->decrement('count');
      }
      return back();
   }

   //!

   public function cart_remove(Cart $cart)
   {
      $cart->delete();
      return back();
   }

   //!

   public function myAccount()
   {
      return view('pages.my-account');
   }

   //!

   public function edit_account()
   {
      return view('pages.edit-account');
   }

   //! 

   public function favorite()
   {
      $favorite = Favorite::query()->where('user_id', Auth::id())->get();
      return view('pages.my-favorite', compact('favorite'));
   }

   public function add_to_favorite(Product $product)
   {
      auth()->user()->favorite()->create([
         'product_id' => $product->id,
         'user_id' => auth()->user()->id,
      ]);

      return redirect()->back();
   }

   public function remove_favorite(Favorite $favorite)
   {
      $favorite->delete();
      return back();
   }

   //!

   public function suggest()
   {
      $product = Product::query()->where('status', '1')->get();
      return view('pages.my-suggest', compact('product'));
   }

   // public function add_suggest(Request $request,Suggest $suggest)
   // {
   //    $suggest = new Suggest([
   //       'store' => $request->get('store'),
   //       'price' => $request->get('price'),
   //       'product_id' => $request->get('product_id'),
   //    ]);

   //    $suggest->save();
   //    return back();
   // }

   //! 

   public function change(Request $request, User $user)
   {

      $current_user = auth()->user();

      if (Hash::check($request->current_password, $current_user->password)) {
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
      } else {
         $user->name = $request->name;
         $user->email = $request->email;
         $user->phone = $request->phone;
      }

      $user->update();
      return back();
   }

   //! 
   
   public function worked_form(Request $request, WorkedForm $workedForm)
   {
      $validate = $request->validate(
         [
            'name' => 'required|min:5|max:50',
            'phone' => 'required|min:11|numeric',
            'email' => 'nullable',
            'set' => 'required|min:5|max:50',
            'price' => 'required|numeric',
            'address' => 'required',
            'description' => 'nullable',
            'image' => 'required|mimes:jpg,zip',
         ],
         [
            'name.required' => 'پر کردن این فیلد اجباری است',
            'name.min' => 'نام باید حداقل 5 حرف باشد',
            'name.max' => 'نام باید حداکثر 50 حرف باشد',

            'phone.required' => 'پر کردن این فیلد اجباری است',
            'phone.min' => 'شماره باید حداقل 11 عدد باشد',
            'phone.numeric' => 'شماره حتما باید عدد باشد',

            'set.required' => 'پر کردن این فیلد اجباری است',
            'set.min' => 'نام دستگاه باید حداقل 5 حرف باشد',
            'set.max' => 'نام دستگاه باید حداکثر 50 حرف باشد',

            'price.required' => 'پر کردن این فیلد اجباری است',
            'price.numeric' => 'قیمت حتما باید عدد باشد',

            'address.required' => 'پر کردن این فیلد اجباری است',

            'image.required' => 'پر کردن این فیلد اجباری است',
            'image.mimes' => 'فرمت عکس باید jpg یا zip باشد',
         ]
      );

      $imageName = 'worked' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/worked', $imageName);

      $workedForm = new WorkedForm([
         'name' => $request->get('name'),
         'phone' => $request->get('phone'),
         'email' => $request->get('email'),
         'set' => $request->get('set'),
         'price' => $request->get('price'),
         'address' => $request->get('address'),
         'description' => $request->get('description'),
         'image' => $imageName,
      ]);

      $workedForm->save();
      $message = "دستگاه جدید با موفقیت افزوده شد و منتظر تأیید مدیر می‌باشد";
      return redirect()->route('pages.worked')->with('send', $message);
   }

   //!

   public function news_request(Request $request,NewsRequest $newsRequest) 
   {
      $newsRequest = new NewsRequest([
         'email' => $request->get('email'),
      ]);

      $newsRequest->save();
      return back();
   }

   //!

   public function about_form(Request $request, ContactForm $contactForm)
   {
      $contactForm = new ContactForm([
         'name' => $request->get('name'),
         'email' => $request->get('email'),
         'phone' => $request->get('phone'),
         'subject' => $request->get('subject'),
         'body' => $request->get('body'),
      ]);

      $contactForm->save();
      return back();
   }

   public function blog_comment(Request $request, Blog $blog)
   {
      $blogComment = new BlogComment([
         'name' => $request->get('name'),
         'email' => $request->get('email'),
         'comment' => $request->get('comment'),
         'blog_id' => $blog->id,
      ]);

      $blogComment->save();
      return back();
   }

   public function ask_comment(Request $request, Product $product)
   {
      $askComment = new AskComment([
         'user_id' => auth()->user()->id,
         'product_id' => $product->id,
         'comment' => $request->get('comment'),
      ]);

      $askComment->save();
      return back();
   }

   public function product_comment(Request $request, Product $product)
   {
      $productComment = new ProductComment([
         'name' => $request->get('name'),
         'email' => $request->get('email'),
         'comment' => $request->get('comment'),
         'rate' => $request->get('rate'),
         'product_id' => $product->id,
      ]);

      $productComment->save();
      return back();
   }
}