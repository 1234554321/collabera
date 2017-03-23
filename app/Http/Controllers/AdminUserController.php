<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Redirect;
use App\Models\User;
use Input;
use Session;
use Image;
use App\Helpers\Helper;
class AdminUserController extends BaseController
{
     public function index()
	 {
	 	$srchval = Input::get('searchkey');
	 	$rolid = Input::get('rlid');
	 	  if($srchval !="" && $rolid !=""){
            $users= User::where('name', 'like', '%'.$srchval.'%')->orWhere('email', 'like', '%'.$srchval.'%')->Where('role_id',$rolid)->paginate(25);
	 	  }elseif($srchval !=""){
	       $users= User::where('name', 'like', '%'.$srchval.'%')->orWhere('email', 'like', '%'.$srchval.'%')->paginate(25);
	      }elseif($rolid !=""){
            $users= User::Where('role_id',$rolid)->paginate(25);
	      }else{
	      	$users= User::whereNotIn('role_id',[6])->paginate(25);
	      }
      return view('admin.dashboard.userlist',compact('users'));
     }

      public function newUser()
	  {
      return view('admin.dashboard.adduser');
      }

     public function edit($id)
	 {
	  $users=User::where('id',$id)->first();
      return view('admin.dashboard.useredit',compact('users'));
     }
     
      public function delete($id)
	  {
	   User::where('id',$id)->delete();
	   Session::flash('message', 'Successfully Deleted User!');
      return back();
      }

      public function multidelete($id)
	  {
	  // User::whereIn('id',)->delete();
	  // Session::flash('message', 'Successfully Deleted User!');
      //return back();
      }
	 
	 public function save(UserRequest $request)
	  {
            /*$fileName="";
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
		      return Redirect::to(Helper::admin_slug().'/page/new');
		    }
		}*/
		 $p=new User;
		 $p->role_id=$request->input('userrole');
		 $p->username=$request->input('username');
		 $p->name=$request->input('name');
		 $p->email= $request->input('email');
		 $p->password=bcrypt($request->input('password'));
		 $p->profileimg='';
		 $p->save();
		  Session::flash('message', 'Successfully created User!');
		 return Redirect(Helper::admin_slug().'/user');
	  }
	  
	public function updateInfo(UserRequest $request)
	  {
	    $p=new User;
		 /*$fileName="";
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
			  $p->where('id',$request->input('id'))->update($data);
		    }else {
		      // sending back with error message.
		      Session::flash('error', 'uploaded file is not valid');
		      return Redirect::to(Helper::admin_slug().'/page');
		    }
		}
		*/
		if($request->input('password') !=""){
		$data = array('role_id' =>$request->input('userrole'),
		               'username' =>$request->input('username'),
					   'name' =>$request->input('name'),
					   'email' =>$request->input('email'),
					   'password' =>bcrypt($request->input('password')),
					   'profileimg' =>'');
	      }else{
           $data = array('role_id' =>$request->input('userrole'),
		               'username' =>$request->input('username'),
					   'name' =>$request->input('name'),
					   'email' =>$request->input('email'),
					   'profileimg' =>'');
	      }
		 $p->where('id',$request->input('id'))->update($data);
		 Session::flash('message', 'Successfully Updated User!');
		 return Redirect(Helper::admin_slug().'/user');
	  }
}
