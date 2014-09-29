<?php
class DashboardController extends BaseController {

    public function __construct() {
    	$this->beforeFilter('@loginCheck');													
    }
	
    public function leftmenu() {
    }

    public function loginCheck() {
        if(!isset(Auth::user()->id)) {
            return Redirect::to('/');
        }
    }

    public function index() {
        if(Auth::user()->id != ROLE_ADMIN) {
            return Redirect::to('/');
        }


        // doc het order cua cac user
        // luu vao 1 array

        // Lay het order trong ngay hom nay theo tung User
        $last_order = Order::where('updated_at', '>=', date('Y-m-d'))->orderBy('updated_at', 'asc')->groupBy('user_id')->get();

        // dd($last_order->toArray());

        $users = User::where('role_id', '=', ROLE_USER)->orderBy('username')->get();
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

    public function getProdList($product_id) {
        if(!$product_id) {
            return 'false';
        }
        $product = Product::find($product_id);
        if(count($product)) {
            $list = Product::where('cat_id', '=', $product->cat_id);
            return (count($list) > 0) ? $list : false;
        }
        return false;
    }
}
