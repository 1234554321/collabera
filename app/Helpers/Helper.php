<?php
namespace App\Helpers;
use DB;
/****https://laravel.com/docs/4.2/queries****/
class Helper
{
    public static function admin_slug()
     { 
      return  $admin_url= "/adminpanel";
     }
     
      /*get all user data*/
    public static function allUser()
    {
        return $users = DB::table('users')->orderBy('id','DESC')->get();
    }
    
    /*get sigle user data using by user id*/
    public static function singleuser($uid)
    {
      return $singleudata = DB::table('users')->where('id', $uid)->get();
    }

    public static function singlecolval($table,$col,$val,$getvalcol)
    {
      $setdata = DB::table($table)->where($col, $val)->get();
       if(count($setdata)>0){
          foreach ($setdata as $key => $value) {
            return $getdata = $value->$getvalcol;
          }
       }else{
          return $getdata = "";
       }
    }

    public static function tableval($table,$col,$val)
    {
      return $setdata = DB::table($table)->where($col, $val)->get();
    }

    public static function totalagent()
    {
      return $setdata = DB::table('agent')->count();
    }

    public static function totalorder()
    {
      return $setdata = DB::table('agent_order')->count();
    }

}
