<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Auth;
use Session;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout', 'getRegister', 'postRegister']]);
            
    }
 
      
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function postLogin(Request $request)
     {
    // get our login input
    $login = $request->input('login');
    // check login field
    $login_type = filter_var( $login, FILTER_VALIDATE_EMAIL ) ? 'email' : 'username';
    // merge our login field into the request with either email or username as key
    $request->merge([ $login_type => $login ]);
    // let's validate and set our credentials
    if ( $login_type == 'email' ) {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only( 'email', 'password' );
    } else {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only( 'username', 'password' );
        }
        if (Auth::attempt($credentials, $request->has('remember')))
        {
            $userdata = User::where('username','=',$login)
                               ->orWhere('email', '=',$login)
                               ->get();
              foreach($userdata as $v){
               Session::set('id',$v->id);
               Session::set('email',$v->email); 
              }
            return redirect()->intended($this->redirectPath());
        }
        return redirect('/login')
        ->withInput($request->only('login', 'remember'))
        ->withErrors([
            'login' => $this->getFailedLoginMessage(),
        ]);
   }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:50',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
			'role_id' => 5,
        ]);
    
    }

    protected function authenticated($request,$user){
	    if($user->hasRole(array('root','administrator'))){
		return redirect()->intended(Helper::admin_slug().'/dashboard'); //redirect to admin panel
	    }else{
	    return redirect()->intended('/'); //redirect to standard user homepage
       }
    }  

   public function getLogout()
    {
    Auth::logout();
    return redirect('/adminpanel/dashboard');
    }

}
