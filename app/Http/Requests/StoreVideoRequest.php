<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
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
         'video'        =>      'required|mimetypes:video/mp4',
         'title'        =>      'required|min:5|max:50',
         'description'  =>      'required|min:5|max:600',
      ];
   }

   public function messages()
   {
      return [
         'video.required' => 'پر کردن این فیلد اجباری است',
         'title.required' => 'پر کردن این فیلد اجباری است',
         'title.min' => 'عنوان باید حداقل 5 کاراکتر باشد',
         'title.max' => 'عنوان باید حداکثر 50 کاراکتر باشد',
         'description.required' => 'پر کردن این فیلد اجباری است',
         'description.min' => 'توضیحات باید حداقل 5 کاراکتر باشد',
         'description.max' => 'توضیحات باید حداکثر 600 کاراکتر باشد',
      ];
   }
}
