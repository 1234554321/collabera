<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
   public function authorize()
   {
      return true;
   }
   
   public function rules()
     {
      return $rules = [
        'username'  => 'required',
        'email'  => 'required',
        ];
     }
	 
	public function messages()
     {
     return [
          'username.required' => 'The username field is required.',
          'email.required' => 'The Email field is required.'
       ];
     }
}
