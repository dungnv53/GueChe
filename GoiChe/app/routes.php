<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
 Route::model('user','User');
 Route::model('products','Product');
 // Route::model('session','OrderSession');

Route::get('/', array('as' => 'home', function () {
	return View::make('home');
}));

Route::get('/', 'BaseController@home');

Route::get('/login', array('uses' => 'AccountsController@login', 'as' => 'login'));
Route::post('/login', array('uses' => 'AccountsController@doLogin', 'as' => 'doLogin'));
Route::get('/accounts/{accounts}/password/reset',array('uses'=>"AccountsController@resetPass",'as'=>'admin.accounts.resetPass'));

Route::get('/accounts/{accounts}/password',array('uses'=>"AccountsController@getPassword",'as'=>'admin.accounts.getPassword'));

Route::post('/accounts/{accounts}/password',array('uses'=>"AccountsController@doPassword",'as'=>'admin.accounts.doPassword'));

Route::get('change_password', ['uses' => 'AccountsController@changePassword', 'as' => 'change_password']);

Route::post('change_password/cmp', ['uses' => 'AccountsController@updateCurrentPassword', 'as' => 'update_current_password']);

Route::get('/accounts/{accounts}/profile',   array('uses' => 'AccountsController@profile', 'as' => 'profile'));
Route::get('/accounts/complete',   array('uses' => 'AccountsController@complete', 'as' => 'account_complete'));
Route::get('/accounts/list',   array('uses' => 'AccountsController@index', 'as' => 'account_list'));
Route::get('/logout',   array('uses' => 'AccountsController@logout', 'as' => 'logout'));
Route::get('/accounts/{user}/delete', array('uses' => 'AccountsController@delete', 'as' => 'accounts.delete'));
Route::get('products/{products}/delete', array('uses' =>  'ProductController@delete', 'as' => 'products.delete'));

Route::post('accounts/{user}/update',array('uses' => 'AccountsController@update','as' => 'accounts.update1'));
Route::post('products/{products}/update', array('uses' => 'ProductController@update', 'as' => 'products.update1'));
Route::post('session/{session}/update', array('uses' => 'SessionController@update', 'as' => 'session.update1'));


Route::resource('accounts', 'AccountsController',array('names' => array('index'  => 'accounts.index'
	 														        ,'create' =>'accounts.create'
	 														    	,'store'  =>'accounts.store'
	 														    	,'show'   =>'accounts.show'
	 														    	,'edit'   =>'accounts.edit'
	 														        // ,'update' =>'accounts.update'
	 														    	,'destroy'=>'accounts.destroy'

	 														 )));

Route::resource('dashboard', 'DashboardController',array('names' => array('index'  => 'dashboard.index'
	 														        ,'create' =>'dashboard.create'
	 														    	,'store'  =>'dashboard.store'
	 														    	,'show'   =>'dashboard.show'
	 														    	,'edit'   =>'dashboard.edit'
	 														    	,'update' =>'dashboard.update'
	 														    	,'destroy'=>'dashboard.destroy'
	 														 )));
Route::get('/report', array('uses' => 'DashboardController@report', 'as' => 'report'));

Route::resource('user', 'UserController',array('names' => array('index'  => 'front_end.index'
 														        ,'create' =>'front_end.create'
 														    	,'store'  =>'front_end.store'
 														    	,'show'   =>'front_end.show'
 														    	,'edit'   =>'front_end.edit'
 														        ,'update' =>'front_end.update'
 														    	,'destroy'=>'front_end.destroy'

	 														 )));


Route::resource('product', 'ProductController',array('names' => array('index'  => 'products.index'
	 														        ,'create' =>'products.create'
	 														    	,'store'  =>'products.store'
	 														    	,'show'   =>'products.show'
	 														    	,'edit'   =>'products.edit'
	 														    	,'update' =>'products.update'
	 														    	,'destroy'=>'products.destroy'
	 														 )));
Route::post('products/getList', array('uses' => 'ProductController@getList', 'as' => 'products.getList'));

Route::resource('order', 'OrderController',array('names' => array('index'  => 'orders.index'
	 														        ,'create' =>'orders.create'
	 														    	,'store'  =>'orders.store'
	 														    	,'show'   =>'orders.show'
	 														    	,'edit'   =>'orders.edit'
	 														    	,'update' =>'orders.update'
	 														    	,'admCreate' =>'orders.admCreate'
	 														    	,'destroy'=>'orders.destroy'
	 														 )));
Route::get('/order/complete',   array('uses' => 'OrderController@complete', 'as' => 'order_complete'));
Route::get('/order/{uid}/admCreate',   array('uses' => 'OrderController@admCreate', 'as' => 'orders.admCreate'));
Route::get('/order/{order_id}/admEdit',   array('uses' => 'OrderController@admEdit', 'as' => 'orders.admEdit'));
Route::post('/order/{uid}/admStore',   array('uses' => 'OrderController@admStore', 'as' => 'orders.admStore'));

Route::resource('session', 'SessionController', array('name' => array('index'  => 'session.index'
																	  ,'create' => 'session.create'
																	  ,'store'  => 'session.store'
																	  ,'show'   => 'session.show'
																	  ,'edit'   => 'session.edit'
																	  ,'update' => 'session.update'
																	 )));


