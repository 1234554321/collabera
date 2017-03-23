<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('/adminpanel',array('before' => 'auth','uses'=>'AdminController@index'));
Route::get('/adminpanel/dashboard',['middleware' => ['auth', 'roles'],'uses' => 'AdminController@dashboard','roles' => ['root', 'administrator','agent']]);
// Logging in and out
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
Route::get('/adminpanel/profile',['middleware' => ['auth', 'roles'],'uses' => 'DashboardController@profile','roles' => ['root']]);
Route::post('/adminpanel/profile/userupdate',['middleware' => ['auth', 'roles'],'uses' => 'DashboardController@userupdate','roles' => ['root']]);

//User route
Route::get('/adminpanel/user/new',['middleware' => ['auth', 'roles'],'uses' => 'AdminUserController@newUser','roles' => ['root']]);
Route::get('/adminpanel/user',['middleware' => ['auth', 'roles'],'uses' => 'AdminUserController@index','roles' => ['root', 'administrator'] ]);
Route::post('/adminpanel/user/save',['middleware' => ['auth', 'roles'],'uses' => 'AdminUserController@save','roles' => ['root']]);
Route::get('/adminpanel/user/edit/{id}',['middleware' => ['auth', 'roles'],'uses' => 'AdminUserController@edit','roles' => ['root']]);
Route::post('/adminpanel/user/updateInfo',['middleware' => ['auth', 'roles'],'uses' => 'AdminUserController@updateInfo','roles' => ['root']]);
Route::get('/adminpanel/user/delete/{id}',['middleware' => ['auth', 'roles'],'uses' => 'AdminUserController@delete','roles' => ['root']]);

//agent route
Route::get('/adminpanel/agent/new',['middleware' => ['auth', 'roles'],'uses' => 'AgentController@newAgent','roles' => ['root']]);
Route::get('/adminpanel/agent',['middleware' => ['auth', 'roles'],'uses' => 'AgentController@index','roles' => ['root', 'administrator'] ]);
Route::post('/adminpanel/agent/save',['middleware' => ['auth', 'roles'],'uses' => 'AgentController@save','roles' => ['root']]);
Route::get('/adminpanel/agent/edit/{id}',['middleware' => ['auth', 'roles'],'uses' => 'AgentController@edit','roles' => ['root','agent']]);
Route::post('/adminpanel/agent/updateInfo',['middleware' => ['auth', 'roles'],'uses' => 'AgentController@updateInfo','roles' => ['root','agent']]);
Route::get('/adminpanel/agent/delete/{id}',['middleware' => ['auth', 'roles'],'uses' => 'AgentController@delete','roles' => ['root']]);
Route::post('/adminpanel/agent/multidelete',['middleware' => ['auth', 'roles'],'uses' => 'AgentController@mltdelete','roles' => ['root']]);
Route::get('/adminpanel/agent/fund/view/{id}',['middleware' => ['auth', 'roles'],'uses' => 'AgentFundController@view','roles' => ['root']]);
Route::post('/adminpanel/agent/fund/save',['middleware' => ['auth', 'roles'],'uses' => 'AgentFundController@save','roles' => ['root']]);

//agent order route
Route::get('/adminpanel/agent/order',['middleware' => ['auth', 'roles'],'uses' => 'AgentOrderController@index','roles' => ['root', 'administrator','agent'] ]);
Route::get('/adminpanel/agent/order/new',['middleware' => ['auth', 'roles'],'uses' => 'AgentOrderController@newOrder','roles' => ['root', 'administrator','agent']]);
Route::post('/adminpanel/agent/order/save',['middleware' => ['auth', 'roles'],'uses' => 'AgentOrderController@save','roles' => ['root', 'administrator','agent']]);
Route::get('/adminpanel/agent/order/delete/{id}',['middleware' => ['auth', 'roles'],'uses' => 'AgentOrderController@delete','roles' => ['root', 'administrator']]);
Route::post('/adminpanel/agent/order/multidelete',['middleware' => ['auth', 'roles'],'uses' => 'AgentOrderController@mltdelete','roles' => ['root', 'administrator']]);
Route::get('/adminpanel/agent/order/edit/{id}',['middleware' => ['auth', 'roles'],'uses' => 'AgentOrderController@edit','roles' => ['root', 'administrator']]);
Route::post('/adminpanel/agent/order/updateInfo',['middleware' => ['auth', 'roles'],'uses' => 'AgentOrderController@updateInfo','roles' => ['root', 'administrator']]);