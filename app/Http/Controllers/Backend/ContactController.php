<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $contacts = Contact::query()->orderBy('id', 'DESC')->get();
      return view('admin.pages.contact.index', compact('contacts'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.contact.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreContactRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreContactRequest $request)
   {
      $contact = new Contact([
         'address' => $request->get('address'),
         'phone' => $request->get('phone'),
         'mobile' => $request->get('mobile'),
      ]);

      $contact->save();
      $message = "اطلاعات تماس با موفقیت افزوده شد";
      return redirect()->route('contact.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Contact  $contact
    * @return \Illuminate\Http\Response
    */
   public function show(Contact $contact)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Contact  $contact
    * @return \Illuminate\Http\Response
    */
   public function edit(Contact $contact)
   {
      return view('admin.pages.contact.edit', compact('contact'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateContactRequest  $request
    * @param  \App\Models\Backend\Contact  $contact
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateContactRequest $request, Contact $contact)
   {
      $contact->update($request->all());
      $message = "اطلاعات تماس با موفقیت ویرایش شد";
      return redirect()->route('contact.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Contact  $contact
    * @return \Illuminate\Http\Response
    */
   public function destroy(Contact $contact)
   {
      $contact->delete();
      $message = "اطلاعات تماس با موفقیت حذف شد";
      return redirect()->route('contact.index')->with('success', $message);
   }

   /**
    * @param Contact $contact
    */
   public function status(Contact $contact)
   {
      if ($contact->status === 1) {
         $contact->status = 0;
      } elseif ($contact->status === 0) {
         $contact->status = 1;
      }
      $contact->save();
      return redirect()->back();
   }
}
