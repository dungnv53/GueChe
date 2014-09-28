<?php
class DashboardController extends BaseController {

    public function __construct() {
    														
    }
	
    public function leftmenu() {
    }

    public function loginCheck() {
    }

    public function index() {
        if(Auth::user()->id != ROLE_ADMIN) {
            return Redirect::to('/');
        }
        
        $users = User::where('role_id', '=', ROLE_USER)->get();
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
