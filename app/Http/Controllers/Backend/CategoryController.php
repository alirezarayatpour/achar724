<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $category = Category::query()->orderBy('id', 'DESC')->paginate(10);
      $parent = Category::query()->where('parent_id', '0')->get();
      return view('admin.pages.category.index', compact('category', 'parent'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $category = Category::where('parent_id', '0')->get();
      return view('admin.pages.category.create', compact('category'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreCategoryRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreCategoryRequest $request)
   {
      $imageName = 'category' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/category', $imageName);

      $category = new Category([
         'category' => $request->get('category'),
         'parent_id' => $request->get('parent_id'),
         'description' => $request->get('description'),
         'image' => $imageName,
      ]);

      $category->save();
      $message = "دسته‌بندی جدید با موفقیت افزوده شد";
      return redirect()->route('category.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function show(Category $category)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function edit(Category $category)
   {
      $categories = Category::where('parent_id', 0)->get();
      return view('admin.pages.category.edit', compact('category', 'categories'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateCategoryRequest  $request
    * @param  \App\Models\Backend\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateCategoryRequest $request, Category $category)
   {
      if(file_exists('images/category'.$category->image)){
         unlink('images/category'.$category->image);
      }

      $imageName = 'category'.'-'.time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move('images/category', $imageName);

      $category->category        =   $request->category;
      $category->parent_id       =   $request->parent_id;
      $category->description     =   $request->description;
      $category->image           =   $imageName;

      $category->save();
      $message = "دسته‌بندی با موفقیت ویرایش شد";
      return redirect()->route('category.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function destroy(Category $category)
   {
      $category->delete();
      $message = "دسته‌بندی با موفقیت حذف شد";
      return redirect()->route('category.index')->with('success', $message);
   }

   /**
    * @param Category $category
    */
   public function status(Category $category)
   {
      if ($category->status === 1) {
         $category->status = 0;
      } elseif ($category->status === 0) {
         $category->status = 1;
      }
      $category->save();
      return redirect()->back();
   }
}
