<?php
class DashboardController extends BaseController {

    public function __construct() {
    														
    }
	
    public function leftmenu() {
    }

    public function loginCheck() {
    }

    public function index() {
        $users = User::all();
        $products = Product::all()->toArray();
        $categories = Category::all()->toArray();

        $che = Product::where('cat_id', '=', 2)->get(); 
        if(!is_null($che)) { 
            $che = $che->toArray();
        } else {
            $che = array();
        }

        return View::make('dashboard.index', compact('users', 'products', 'categories', 'che'));
    }

    public function logout() {
    	Auth::logout();
        return Redirect::intended('/login');
    }


    public function create($id = null) {
        
        return View::make('account.form');
    }

    public function edit($id = null) {
        
    }

    public function store($id = null) {
    	// dd(Input::all());

    	 $rules = array(
         'username'=>'required|alpha_dash',
         'password'=>'required|alpha_dash',
         'role_id'=>'required|numeric|digits_between:1,3',
         'email'=>'required|email',
         // 'email_confirmation'=>'required|email',
        );
        
        $validator = Validator::make(Input::all(), $rules);

        if($validator->passes()) {
        	$user = new User();
        	$user->username = Input::get('username');
        	$user->password = Hash::make(Input::get('password'));
        	$user->email = Input::get('email');
        	$user->role_id = Input::get('role_id');
        	$user->save();

        } else {
        	return Redirect::back()
            ->withInput()
            ->withErrors($validator);
        }

        return View::make('account.complete');

        return Redirect::back()
            ->withInput()
            ->withErrors($validator);
    }

    public function complete() {
    	return View::make('account.complete');
    }

    public function update($id='') {
        
    }

    public function show($id) {
        
    }

    public function resetPass() {
    	return "reset passwd";
    }

    public function getPassword($account_id) {
    }

    public function doPassword($account_id) {
     	return "do passwd";
    }
}
