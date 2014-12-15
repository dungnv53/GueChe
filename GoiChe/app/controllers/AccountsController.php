<?php
class AccountsController extends BaseController {

    public function __construct() {
        $this->beforeFilter('@check_access_action', array('only' =>
                            array('edit', 'create', 'list', 'destroy', 'store', 'index')));														
    }

    public function check_access_action() {
        if(Auth::user()->role_id != ROLE_ADMIN) {
            return Redirect::to('/');
        }
    }
    public function getlist(){ 
    }
    
    public function index(){
        $users = User::orderBy('username')->paginate(15);

        return View::make('account.index',compact('users'));
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

    public function logout() {
    	Auth::logout();
        return Redirect::intended('/login');
    }


    public function create($id = null) {
        
        return View::make('account.form');
    }

    public function edit($id) {
        $user = User::find($id);
        return View::make('account.edit',compact('user'));
    }

    public function delete(User $user){
        $user->delete();
         return Redirect::route('accounts.index');
    }
   

    public function store($id = null) {
        // Edit
        $uid = Input::get('user_id');
        if($uid) {
         $rules = array(
         'username'=>'required|alpha_dash',
         'fullname'=>'required',
         'password'=>'required|alpha_dash',
         'role_id'=>'required|numeric|digits_between:1,3',
         'email'=>'required|email',
         // 'email_confirmation'=>'required|email',
        );
        
        $validator = Validator::make(Input::all(), $rules);

        if($validator->passes()) {
            $user = User::where('id', '=', $uid)->first();
            $user->username = Input::get('username');
            $user->fullname = Input::get('fullname');
            $user->password = Input::get('password');
            $user->email = Input::get('email');
            $user->role_id = Input::get('role_id');
            $user->save();

        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        return View::make('account.complete');

        return Redirect::back() ->withErrors($validator) ->withInput();
        }

    	// dd(Input::all());

    	 $rules = array(
         'username'=>'required|alpha_dash',
         'fullname'=>'required',
         'password'=>'required|alpha_dash',
         'role_id'=>'required|numeric|digits_between:1,3',
         'email'=>'required|email|unique:users',
         // 'email_confirmation'=>'required|email',
        );
        
        $validator = Validator::make(Input::all(), $rules);

        if($validator->passes()) {
        	$user = new User();
            $user->username = Input::get('username');
        	$user->fullname = Input::get('fullname');
        	$user->password = Hash::make(Input::get('password'));
        	$user->email = Input::get('email');
        	$user->role_id = Input::get('role_id');
        	$user->save();

        } else {
        	return Redirect::back()->withErrors($validator)->withInput();
        }

        return View::make('account.complete');

        return Redirect::back()->withErrors($validator)->withInput();
    }

    public function complete() {
    	return View::make('account.complete');
    }

   

    public function update(User $user) {
        // dd($id);
        $data = [
                    'username'  => Input::get('username'),
                    'fullname'  => Input::get('fullname'),
                    'email'     => Input::get('email'),
                    'role_id'   => Input::get('role_id')
        ];

        $rules = [
                    'username'=>'required|alpha_dash',
                    'email'=>'required|email',
                    'role_id'=>'required|numeric|digits_between:1,3',
        ];

        $valid = Validator::make($data, $rules);
        if($valid->passes())
        {
            $user->username = $data['username'];
            $user->fullname = $data['fullname'];
            $user->email    = $data['email'];
            $user->role_id  = $data['role_id'];
            if(count($user->getDirty()) > 0)
            {
                $user->save();
                return Redirect::route('accounts.index');
            } else
                return Redirect::back();
        } else
            return Redirect::back()->withErrors($valid)->withInput();
        }
    

    public function show($id) {}
        

    public function doLogin() {
	    if ($this->isPostRequest()) {
	        $validator = $this->getLoginValidator();

		    $user = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);

		  	if (Auth::attempt($user)) {
                // $role_id = Auth::user()->role_id;
                // dd($role_id);
                // if($role_id == 1){
                    return Redirect::route('home')
                  ->with('flash_notice', 'You are successfully logged in.');
                // }
                // else{
                //     return Redirect::route('front_end.index');
                // }
			  
			} else {
				return Redirect::route('login')
			      ->with('flash_notice', 'Wrong username or password.');
			}
	  
	      // $current_password = Input::get('password');
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

    // get change password (user)
    public function getChangePass() {
        
    	return View::make('account.changePassword');
    }

    //post change password
    public function postChangePass(){
     
        $validator = Validator::make(Input::all(),
                array(
                        'old_password'      => 'required',
                        'new_password'      => 'required|min:4',
                        'confirm_password'  => 'required|same:new_password'
                    )
            );
        if($validator->fails())
        {
            return Redirect::route('changePassword')->withErrors($validator);
        }
        else
        {
            $user     = User::find(Auth::user()->id);
            $pass     = Input::get('old_password');
            $new_pass = Input::get('new_password');
            if(Hash::check($pass, $user->getAuthPassword())){
                $user->password = Input::get('new_password');
                
                if($user->save()){
                    return Redirect::route('home');
                }
            }
            else return Redirect::route('changePassword')->withErrors('The old password is incorrect');

        }
    }
}














