<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;
class AgentRequest extends Request
{
   public function authorize()
   {
      return true;
   }
   
   public function rules()
     {
        if(!Input::has('agntpassword') && !Input::has('repassword')){
          return $rules = [
          'agentname'  => 'required',
          'agentphone'  => 'required',
          ];
        }else{
      return $rules = [
        'agentname'  => 'required',
        'agentphone'  => 'required',
        'agntpassword'  => 'required',
        'repassword'  => 'required',
        ];
      }
     }
	 
	public function messages()
     {
       if(!Input::has('agntpassword') && !Input::has('repassword')){
        return [
          'agentname.required' => 'The Name field is required.',
          'agentphone.required' => 'The Phone field is required.',
        ];
       }else{
     return [
          'agentname.required' => 'The Name field is required.',
          'agentphone.required' => 'The Phone field is required.',
          'agntpassword.required' => 'The Password field is required.',
          'repassword.required' => 'The Confirm Password field is required.',
        ];
       }
    }
}
