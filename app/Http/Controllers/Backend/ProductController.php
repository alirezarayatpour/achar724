<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use App\Models\Backend\Image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $products = Product::query()->orderBy('id', 'DESC')->paginate(5);
      return view('admin.pages.product.index', compact('products'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $categories = Category::query()->get();
      $brand = Brand::query()->get();
      return view('admin.pages.product.create', compact('categories', 'brand'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreProductRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreProductRequest $request)
   {
      $imageName = 'cover' . '-' . time() . '.' . $request->cover->getClientOriginalExtension();
      $request->cover->move('image/cover', $imageName);

      $product = new Product([
         'title'             =>      $request->get('title'),
         'feature'           =>      $request->get('feature'),
         'description'       =>      $request->get('description'),
         'storage'           =>      $request->get('storage'),
         'price'             =>      $request->get('price'),
         'sale'              =>      $request->get('sale'),
         'weight'            =>      $request->get('weight'),
         'capacity'          =>      $request->get('capacity'),
         'position'          =>      $request->get('position'),
         'brand'             =>      $request->get('brand'),
         'cover'             =>      $imageName,
         'category_id'       =>      $request->get('category_id'),
      ]);
      $product->save();

      if ($request->hasFile('images')) {
         $files = $request->file('images');
         foreach ($files as $file) {
            $imageName = 'images' . '-' . time() . '-' . $file->getClientOriginalName();
            $request['product_id'] = $product->id;
            $request['image'] = $imageName;
            $file->move('image/images/', $imageName);
            Image::create($request->all());
         }
      }

      $message = "محصول جدید با موفقیت افزوده شد";
      return redirect()->route('product.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function show(Product $product)
   {
      $images = Image::query()->get();
      return view('admin.pages.product.show', compact('product', 'images'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function edit(Product $product)
   {
      $images = Image::query()->get();
      $categories = Category::query()->get();
      $brand = Brand::query()->get();
      return view('admin.pages.product.edit', compact('product', 'images', 'categories', 'brand'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateProductRequest  $request
    * @param  \App\Models\Backend\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateProductRequest $request, Product $product, Image $image)
   {
      if ($request->hasFile("cover")) {
         if (file_exists("cover/" . $product->cover)) {
            unlink("cover/" . $product->cover);
         }
         $imageName = 'cover' . '-' . time() . '.' . $request->cover->getClientOriginalExtension();
         $request->cover->move('image/cover', $imageName);
      }

      $product->title         =       $request->title;
      $product->feature         =       $request->feature;
      $product->description   =       $request->description;
      $product->storage       =       $request->storage;
      $product->price         =       $request->price;
      $product->sale          =       $request->sale;
      $product->weight          =       $request->weight;
      $product->capacity          =       $request->capacity;
      $product->position          =       $request->position;
      $product->brand          =       $request->brand;
      $product->cover          =       $imageName;
      $product->category_id     =       $request->category_id;
      $product->save();

      if ($request->hasFile('images')) {
         if (file_exists("images/" . $image->image)) {
            unlink("images/" . $image->image);
         }
         $files = $request->file('images');
         foreach ($files as $file) {
            $imageName = 'images' . '-' . time() . '-' . $file->getClientOriginalName();
            $request['product_id'] = $product->id;
            $request['image'] = $imageName;
            $file->move('image/images/', $imageName);
            Image::create($request->all());
         }
      }

      $message = "ویرایش محصول انجام شد";
      return redirect()->route('product.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function destroy(Product $product)
   {
      $images = Image::where("product_id", $product->id)->get();
      foreach ($images as $image) {
         if (File::exists("images/" . $image->image)) {
            File::delete("images/" . $image->image);
         }
      }

      $product->delete();
      $message = "حذف محصول انجام شد";
      return redirect()->route('product.index')->with('warning', $message);
   }

   /**
    * @param Product $product
    */
   public function status(Product $product)
   {
      if ($product->status === 1) {
         $product->status = 0;
      } elseif ($product->status === 0) {
         $product->status = 1;
      }
      $product->save();
      return redirect()->back();
   }
}
