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
}
