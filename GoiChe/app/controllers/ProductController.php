<?php
class ProductController extends BaseController {

    public function __construct() {
    														
    }
	
    public function leftmenu() {
    }

    public function loginCheck() {
    }

    public function index() {
       
    }

    public function create($id = null) {
        $users = User::where('role_id', '=', ROLE_USER)->get();
        $products = Product::all()->toArray();
        $categories = Category::all()->toArray();

        $che = Product::where('cat_id', '=', 2)->get(); 
        if(!is_null($che)) { 
            $che = $che->toArray();
        } else {
            $che = array();
        }

        return View::make('product.form', compact('users', 'products', 'categories', 'che'));
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
