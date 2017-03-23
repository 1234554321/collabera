<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;
class AgentOrderRequest extends Request
{
   public function authorize()
   {
      return true;
   }
   
   public function rules()
     {
      return $rules = [
        'pnrno'  => 'required',
        'pymntmod'  => 'required',
        ];      
     }
	 
	public function messages()
     {
        return [
          'pnrno.required' => 'The PNR/Booking No field is required.',
          'pymntmod.required' => 'The Payment Mode field is required.',
        ];
     
    }
}
