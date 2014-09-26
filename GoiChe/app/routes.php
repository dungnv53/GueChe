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

Route::get('/logout',   array('uses' => 'AccountsController@logout', 'as' => 'logout'));

