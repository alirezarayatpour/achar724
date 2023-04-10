<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
      if (auth()->user()->role == 1 || auth()->user()->role == 2) {
         return true;
      } else {
         return false;
      }
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, mixed>
    */
   public function rules()
   {
      return [
         'address'  =>      'required',
         'phone'     =>      'required',
         'mobile'     =>      'required',
      ];
   }

   public function messages()
   {
      return [
         'address.required' => 'پر کردن این فیلد اجباری است',
         'phone.required' => 'پر کردن این فیلد اجباری است',
         'mobile.required' => 'پر کردن این فیلد اجباری است',
      ];
   }
}
