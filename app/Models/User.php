<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	 /**
     * The user table.
     */
	protected $table = 'users';

	public function role()
	{
		return $this->hasOne('App\Models\Role', 'id', 'role_id');
	}

	public function hasRole($roles)
	{
		$this->have_role = $this->getUserRole();
		// Check if the user is a root account
		//if($this->have_role->name == 'Root') {
		///	return true;
		//}else{
		  //  return false;
		 // }
                
		if(is_array($roles)){
			  if(in_array(strtolower($this->have_role->name),$roles)) {
			      return true;
		            }else{
		             return false;
		            }
		      }else{
			return $this->checkIfUserHasRole($roles);
		     }
		return false;
	    }

    public function isrole($role){
	   $this->have_role = $this->getUserRole();
		// Check if the user is a root account
		if($this->have_role->name == $role) {
			return true;
		}else{
		    return false;
		  }
	 }
     
	public function getUserRole()
	{
		return $this->role()->getResults();
	}

	private function checkIfUserHasRole($need_role)
	{
		return (strtolower($need_role)==strtolower($this->have_role->name)) ? true : false;
	}

	
}
