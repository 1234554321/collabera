<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session;
use App\Models\Role;
use App\Helpers\Helper;
class DashboardController extends Controller
{
      public function __construct(User $user)
		{
			$this->user = $user;
		}

    protected function singleuserinfo(){
        $uid = Session::get('id');
        return $userdata = User::where('id','=',$uid)
                               ->get();
        
       }
     public function profile(){
         $roles= Role::all();
          $userdata = $this->singleuserinfo();
        return view('admin.dashboard.profileedit',compact('userdata','roles'));
     }

    public function userupdate(Request $request){
      if($request->input('password') !=""){
        $data = array('username' =>$request->input('editusername'),
                       'name' =>$request->input('editname'),
                       'email' =>$request->input('editemail'),
                       'password' =>bcrypt($request->input('password')),
                       'role_id' =>$request->input('editrole'));
        }else{
           $data = array('username' =>$request->input('editusername'),
                       'name' =>$request->input('editname'),
                       'email' =>$request->input('editemail'),
                       'role_id' =>$request->input('editrole'));
         }
         User::where('id',$request->input('uid'))->update($data);
         Session::flash('message', 'Successfully Updated user!');
         return Redirect(Helper::admin_slug()."/dashboard");
    }
    
}
