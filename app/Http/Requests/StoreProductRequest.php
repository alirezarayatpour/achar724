<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
         'title' => 'required|max:30',
         'description' => 'required',
         'feature' => 'required',
         'storage' => 'required',
         'price' => 'required',
         'weight' => 'required',
         'capacity' => 'required',
         'position' => 'required',
         // 'images[]' => 'required|mimes:jpeg,png,jpg,gif',
         'category_id' => 'required',
      ];
   }

   public function messages()
   {
      return [
         'title.required' => 'پر کردن این فیلد اجباری است',
         'title.max' => 'عنوان باید حداکثر 30 کاراکتر باشد',
         'description.required' => 'پر کردن این فیلد اجباری است',
         'feature.required' => 'پر کردن این فیلد اجباری است',
         'storage.required' => 'پر کردن این فیلد اجباری است',
         'price.required' => 'پر کردن این فیلد اجباری است',
         'weight.required' => 'پر کردن این فیلد اجباری است',
         'capacity.required' => 'پر کردن این فیلد اجباری است',
         'position.required' => 'پر کردن این فیلد اجباری است',
         // 'images[].required' => 'پر کردن این فیلد اجباری است',
         'category_id.required' => 'پر کردن این فیلد اجباری است',
      ];
   }
}
