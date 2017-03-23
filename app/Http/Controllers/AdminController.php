<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class AdminController extends Controller
{
      public function __construct(User $user)
		{
			$this->user = $user;
		}
     public function index(){
        return view('admin.include.login');
     }

      public function dashboard(){
      return view('admin.dashboard.index');
     }

     public function form(){
      return view('admin.dashboard.form');
     }
     
     public function formvalidation(){
      return view('admin.dashboard.formvalidation');
     }
}
