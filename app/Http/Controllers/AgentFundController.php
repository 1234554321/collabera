<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Redirect;
use App\Models\Agentfund;
use Input;
use Session;
use App\Helpers\Helper;
class AgentFundController extends BaseController
{
	public function view($id)
	 {
      $rowcount = agentfund::where('agnt_id',$id)->count();
      if($rowcount>0){
           $agentfund = agentfund::where('agnt_id',$id)->get();
           return view('admin.dashboard.agentfund',compact('agentfund'));
         }else{

            $agentid = $id;
            return view('admin.dashboard.agentfund',compact('agentid'));
       }
      
	 }
     
     public function save()
	  {
		 $agntid = Input::get('agntid');
		 $addfund = Input::get('addfund');
		 $A = new Agentfund;
		 $A->agnt_id = $agntid;
		 $A->agnt_fund = $addfund;
		 $A->save();
		  Session::flash('message', 'Successfully added fund!');
		 return Redirect(Helper::admin_slug().'/agent');
	  }

      /*public function newAgent()
	  {
      return view('admin.dashboard.agentadd');
      }

     public function edit($id)
	 {
	  $agents = agent::where('id',$id)->first();
      return view('admin.dashboard.agentedit',compact('agents'));
     }
     
      public function delete($id)
	 {
	   agent::where('Id',$id)->delete();
	   Session::flash('message', 'Successfully Deleted agent!');
       return back();
     }
	 	  
	public function updateInfo(AgentRequest $request)
	  {
	     $A=new Agent;
		 $fileName="";
		 if(Input::hasFile('img')){
          if (Input::file('img')->isValid()) {
	      $destinationPath = 'uploads'; // upload path
	      $extension = Input::file('img')->getClientOriginalExtension(); // getting image extension
	      $fileName = rand(11111,99999).'.'.$extension; // renameing image
	      Input::file('img')->move($destinationPath, $fileName); // uploading file to given path
          $img = Image::make($destinationPath."/".$fileName)->resize(320, 240);
          $img->save($destinationPath.'/medium'.$fileName);
          $img = Image::make($destinationPath."/".$fileName)->resize(150, 150);
          $img->save($destinationPath.'/thumbnail'.$fileName);
		  $data = array('image' =>$fileName);
		  $A->where('Id',$request->input('id'))->update($data);
		    }else {
		      // sending back with error message.
		      Session::flash('error', 'uploaded file is not valid');
		      return Redirect::to(Helper::admin_slug().'/agent');
		    }

		}
		 $data = array('agnt_name' => addslashes($request->input('agentname')),
		                'agnt_address' => addslashes($request->input('agentaddress')),
		                'agnt_city' => addslashes($request->input('agentcity')),
		                'agnt_country' => addslashes($request->input('agentcountry')),
		                'agnt_phone' => $request->input('agentphone'),
		                'agnt_email' => $request->input('agentemail'),
		                'agnt_username' => $request->input('agentusrname'),
		                'updated_at' => date("Y-m-d H:i:s"),
		                'status' => $request->input('sts')
		               );
		 $A->where('Id',$request->input('id'))->update($data);
		 Session::flash('message', 'Successfully Updated Agent!');
		 return Redirect(Helper::admin_slug().'/agent');
	  }*/
}
