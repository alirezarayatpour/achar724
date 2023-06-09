<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
         'question'        =>      'required|min:5|max:150',
         'answer'  =>      'required',
      ];
   }

   public function messages()
   {
      return [
         'question.required' => 'پر کردن این فیلد اجباری است',
         'question.min' => 'عنوان باید حداقل 5 کاراکتر باشد',
         'question.max' => 'عنوان باید حداکثر 150 کاراکتر باشد',
         'answer.required' => 'پر کردن این فیلد اجباری است',
      ];
   }
}
