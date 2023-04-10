<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Suggest;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $suggest = Suggest::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.suggest.index', compact('suggest'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request, Suggest $suggest)
   {
      $suggest = new Suggest([
         'store' => $request->get('store'),
         'price' => $request->get('price'),
         'storage' => $request->get('storage'),
         'product_id' => $request->get('product_id'),
      ]);

      $suggest->save();
      return back();
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      //
   }

   /**
    * @param Suggest $suggest
    */
   public function status(Suggest $suggest)
   {
      if ($suggest->status === 1) {
         $suggest->status = 0;
      } elseif ($suggest->status === 0) {
         $suggest->status = 1;
      }
      $suggest->save();
      return redirect()->back();
   }
}
