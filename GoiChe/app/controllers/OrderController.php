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
        $uid = Auth::user()->id;

        if(is_null($uid)) Redirect::to('/');

        if(!is_null($categories)) {

            // Todo only 1 oder per day 
            // exist --> get order this day
            $order = Order::where('user_id', '=', $uid)->orderBy('updated_at', 'desc')->first();
            if(is_null($order)) {
                $new_order = new Order();
                $new_order->user_id = Auth::user()->id;
                $new_order->orderSession_id = 1; // fix me
                $new_order->touch();
                $new_order->save();
            } else {
                $order->touch();
                $order->save();
            }

            $number = 0;
            foreach($categories as $cat) {
                $cur_row = $number++;
                $p_order = new ProductOrder();
                $p_order->order_id = is_null($order) ? $new_order->id : $order->id;
                if($qtys[$cur_row] > 0) {
                    $p_order->quantity = $qtys[$cur_row];
                }
                if($products[$cur_row] > 0) {
                    $p_order->product_id = $products[$cur_row]; // fix me
                    $p_order->touch();
                    $p_order->save();
                }
            }
        return View::make('order.complete');
        // return Redirect::to(route('order_complete'));
        }
        // dd(Input::all());

    	return Redirect::back()
            ->withInput();
    }

    public function complete() {
        dd('outa');
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
