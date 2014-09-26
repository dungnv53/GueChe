<?php
class AccountsController extends BaseController {
	// protected $with_model = 'account.agent';

    public function __construct() {
    														
    }
	
    public function leftmenu() {
    }

    public function login() {
    	if (Auth::check()) {

            return Redirect::intended('/');
        }
        $model = new User();
        return View::make('account.login', compact('model'));
    }

    public function loginCheck() {
    }

    public function changePassword() {
    }

    public function updateCurrentPassword() {
    	return "update cur passwd";
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

    public function doLogin() {
	    if ($this->isPostRequest()) {
	        $validator = $this->getLoginValidator();

		    $user = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);

		  	if (Auth::attempt($user)) {
			  return Redirect::route('home')
			      ->with('flash_notice', 'You are successfully logged in.');
			} else {
				return Redirect::route('login')
			      ->with('flash_notice', 'Wrong username or password.');
			}
	  
	      $current_password = Input::get('password');
	      if ($validator->passes()) {
	        echo "Validation passed!";
	      } else {
	        echo "Validation failed!";
	      }
    	}
  
    	return View::make("common/home");
    }
    
    protected function isPostRequest() {
      return Input::server("REQUEST_METHOD") == "POST";
    }
    
    protected function getLoginValidator() {
      return Validator::make(Input::all(), [
        "username" => "required",
        "password" => "required"
      ]);
    }

    public function profile() {
    	return View::make('account.profile');
    }
}
