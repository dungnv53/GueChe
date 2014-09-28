<?php
class OrderController extends BaseController {

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

        return View::make('order.form', compact('users', 'products', 'categories', 'che'));
    }

    public function edit($id = null) {
        
    }

    public function store($id = null) {

        $categories = Input::get('category');
        $products = Input::get('product');
        $qtys = Input::get('quantity');

        if(!is_null($categories)) {

            // Todo only 1 oder per day 
            // exist --> get order this day
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->orderSession_id = 1; // fix me
            $order->touch();
            $order->save();

            $number = 0;
            foreach($categories as $cat) {
                $cur_row = $number++;
                $p_order = new ProductOrder();
                $p_order->order_id = $order->id;
                if($qtys[$cur_row] > 0) {
                    $p_order->quantity = $qtys[$cur_row];
                }
                if($products[$cur_row] > 0) {
                    $p_order->product_id = $products[$cur_row]; // fix me
                    $p_order->touch();
                    $p_order->save();
                }
            }
        return Redirect::to('/order/complete');
        }
        // dd(Input::all());
        // dd($products);

    	return Redirect::back()
            ->withInput();
    }

    public function complete() {
        return 'ota';
    	return View::make('order.complete');
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
