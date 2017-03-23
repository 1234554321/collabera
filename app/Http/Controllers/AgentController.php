<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\AgentRequest;
use App\Http\Controllers\Redirect;
use App\Models\Agent;
use App\Models\Agentfund;
use App\Models\User;
use Illuminate\Pagination;
use Input;
use Session;
use Image;
use App\Helpers\Helper;
class AgentController extends BaseController
{
     public function index()
	 {
	   $srchval = Input::get('searchkey');
        if($srchval !=""){
             $agents = agent::where('agnt_name', 'like', '%'.$srchval.'%')->orWhere('agnt_email', 'like', '%'.$srchval.'%')->orWhere('agnt_city', 'like', '%'.$srchval.'%')->orWhere('agnt_country', 'like', '%'.$srchval.'%')->orWhere('agnt_phone', 'like', '%'.$srchval.'%')->orWhere('agnt_address', 'like', '%'.$srchval.'%')->orderBy('created_at', 'desc')->paginate(25);
        }else{
         $agents = agent::orderBy('created_at', 'desc')->paginate(25);
       }
      return view('admin.dashboard.allagent',compact('agents'));
     }

      public function newAgent()
	  {
      return view('admin.dashboard.agentadd');
      }

     public function edit($id)
	 {
	  $agents = agent::where('agntu_id',$id)->first();
      return view('admin.dashboard.agentedit',compact('agents'));
     }
     
      public function delete($id)
	 {
	 	 User::where('id',$id)->delete();
	   agent::where('agntu_id',$id)->delete();
	   Session::flash('message', 'Successfully Deleted agent!');
       return back();
     }
	 
	 public function mltdelete()
	 {
	 	$mid = Input::get('multicheckbox');
	 	if(count($mid)>0){
	 	  foreach($mid as $id){
	 	  	User::where('id',$id)->delete();
	        agent::where('agntu_id',$id)->delete();
	      }
	      Session::flash('message', 'Successfully Deleted agent!');
	    }
	   //Session::flash('message', 'Successfully Deleted agent!');
       return back();
     }
	 
	 public function save(AgentRequest $request)
	  {
          $fileName = "";
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
	      // sending back with message
	      //Session::flash('success', 'Upload successfully'); 
	      ///return Redirect::to('upload');
		    }
		    else {
		      // sending back with error message.
		      Session::flash('error', 'uploaded file is not valid');
		      return Redirect::to(Helper::admin_slug().'/agent/new');
		    }
		}
		 $agntfund = $request->input('agntfund');
		 $u = new User;
		 $u->role_id = 6;
		 $u->username = $request->input('agentusrname');
		 $u->name = addslashes($request->input('agentname'));
		 $u->email = $request->input('agentemail');
		 $u->password = bcrypt($request->input('agntpassword'));
		 $u->profileimg = '';
		 $u->save();
		 $A = new Agent;
		 $A->agnt_name = addslashes($request->input('agentname'));
		 $A->agnt_address = addslashes($request->input('agentaddress'));
		 $A->agnt_city = addslashes($request->input('agentcity'));
		 $A->agnt_country = addslashes($request->input('agentcountry'));
		 $A->agnt_phone = $request->input('agentphone');
		 $A->agnt_email = $request->input('agentemail');
		 $A->agnt_username = $request->input('agentusrname');
		 $A->agntu_id = $u->id;
		 $A->image = $fileName;
		 $A->status = $request->input('sts');
		 $A->save();
          if($agntfund !="" && is_numeric($agntfund) && $A->id>0){
                $f = new Agentfund;
                  $f->agnt_id = $u->id;
                  $f->agnt_fund = $agntfund;
                  $f->save();
              }

		  Session::flash('message', 'Successfully created agent!');
		 return Redirect(Helper::admin_slug().'/agent');
	  }
	  
	public function updateInfo(AgentRequest $request)
	  {
	  	 if( \Auth::check() ){ 
	   	  $userid = \Auth::user()->id ; 
	   	  $userrolid = \Auth::user()->role_id ;
		   	}else{ 
		   	  $userid = "";
		   	  $userrolid =""; 
		   	}
	     $A=new Agent;
	     $u = new User;
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
		  $A->where('agntu_id',$request->input('id'))->update($data);
		    }else {
		      // sending back with error message.
		      Session::flash('error', 'uploaded file is not valid');
		      return Redirect::to(Helper::admin_slug().'/agent');
		    }

		}
		if($request->input('agntpassword') !=""){
        $data = array('role_id' =>6,
		               'username' =>$request->input('agentusrname'),
					   'name' =>addslashes($request->input('agentname')),
					   'email' =>$request->input('agentemail'),
					   'password' => bcrypt($request->input('agntpassword')),
					   'profileimg' =>'');
		    }else{
		$data = array('role_id' =>6,
		               'username' =>$request->input('agentusrname'),
					   'name' =>addslashes($request->input('agentname')),
					   'email' =>$request->input('agentemail'),
					   'profileimg' =>'');
	      }
		 $u->where('id',$request->input('id'))->update($data);
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
		 $A->where('agntu_id',$request->input('id'))->update($data);

		 if($userrolid==6){
             Session::flash('message', 'Successfully Updated Your Profile!');
		 return Redirect(Helper::admin_slug().'/dashboard');
		    }else{
		 Session::flash('message', 'Successfully Updated Agent!');
		 return Redirect(Helper::admin_slug().'/agent');
		 }
	  }
}
