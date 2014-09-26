<?php
class AccountsController extends BaseController {
	// protected $with_model = 'account.agent';

    public function __construct() {
    	$this->checkAuthenticate('admin.accounts.index');
        $this->beforeFilter('@leftmenu',array('except' => array(
																'login',
																'logout',
																'loginCheck',
															)));
		$this->beforeFilter('@check_access_action', array('only' =>
	                            array('edit','update','destroy','show','getPassword','doPassword')));
																
    }
	
	public function check_access_action($route, $request)
	{

	}
	
    public function leftmenu() {
    }

    public function login() {
        if (Auth::check()) {

            return Redirect::intended('/');
        }
        $model = new Account();
        return View::make('account.login', compact('model'));
    }

    public function loginCheck() {
    }

    public function changePassword() {
    	$model = App::make('Account');

    	return View::make('account.change_passwd',['model' => $model]);
    }

    public function updateCurrentPassword() {
    	return "update cur passwd";
    }

    public function logout() {
        Auth::logout();
        //Session::flash('flash.success', Lang::get('alert.logged_out'));
        return Redirect::intended('/login')->withInput()
			->withErrors(array(Lang::get('alert.logged_out')));
    }


    public function create($id = null) {
        
    }

    public function edit($id = null) {
        
    }

    public function store($id = null) {
        
    }

    public function update($id='') {
        
    }

    public function show($id) {
        
    }

    public function resetPass() {
    	return "reset passwd";
    }

    public function getPassword($account_id) {
        $model = App::make('Account');
		$account = Account::where('id','=',$account_id)
			                ->where('del_flag','=', C_NOT_DELETE)
							->first();

        if($account) {
           View::share('fullname', $account['fullname']);
           View::share('username', $account['username']);
           View::share('permission', $account['permission']);
        } else {
           View::share('fullname', '');
           View::share('username', '');
           View::share('permission', '');
        }

        return View::make('account.password',['model' => $model, 'mod_account_id' => $account_id]);
    }

    public function doPassword($account_id) {
     	return "do passwd";
    }
}
