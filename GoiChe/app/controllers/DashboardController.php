<?php
class DashboardController extends BaseController {

    public function __construct() {
    	$this->beforeFilter('@loginCheck');													
    }

    public function loginCheck() {
        if(!isset(Auth::user()->id)) {
            return Redirect::to('/login');
        }

        if(Auth::user()->role_id != ROLE_ADMIN) {
            return Redirect::to('/');
        }
    }

    public function index() {
        if(Auth::user()->id != ROLE_ADMIN) {
            return Redirect::to('/');
        }

        $users = User::where('role_id', '=', ROLE_USER)->orderBy('username')->get();
        $products = Product::all()->toArray();
        $categories = Category::all()->toArray();

        $che = Product::where('cat_id', '=', 3)->get(); 
        if(!is_null($che)) { 
            $che = $che->toArray();
        } else {
            $che = array();
        }

        return View::make('dashboard.index', compact('users', 'products', 'categories', 'che'));
    }

    public function edit($id = null) {
        
    }

    public function store($id = null) {
    	
    }

    public function update($id='') {
        
    }

    public function show($id) {
        
    }

    public function report() {
        $list = ProductOrder::where('updated_at', '>=', date('Y-m-d'))->groupBy('product_id')->get();
        View::share(compact('list'));
        return View::make('dashboard.report');
    }
}
