<?php
class OrderController extends BaseController {

    public function __construct() {
        $this->beforeFilter('@check_access_action', array('only' =>
                            array('edit', 'create', 'show', 'destroy', 'store')));                                                      
    }

    public function check_access_action() {
        if(!isset(Auth::user()->id)) {
            return Redirect::to('/');
        }
    }

    public function loginCheck() {
    }

    public function index() {
        $user = Auth::user();
        $last_order = Order::where('updated_at', '>=', date('Y-m-d'))->orderBy('updated_at', 'asc')->where('user_id', '=', Auth::user()->id)->first();

        if(isset($last_order->id)) {
            // $prod_orders = ProductOrder::where('created_at', '>=', date('Y-m-d'))->where('order_id', '=', $last_order->id)->get();
            $prod_orders = DB::table('product_order')->join('products', 'product_order.product_id', '=', 'products.id')
                ->join('categories', 'categories.id', '=', 'products.cat_id')
                ->where('product_order.order_id','=',$last_order->id )
                ->get();
                // get(array())
        } else {
            $prod_orders = NULL;
        }

        // dd($prod_orders);

        return View::make('order.index', compact('prod_orders', 'last_order'));
    }

    public function create($id = null) {
        $users = Auth::user();
        $last_order = Order::where('updated_at', '>=', date('Y-m-d'))->orderBy('updated_at', 'asc')->where('user_id', '=', Auth::user()->id)->first();
        if(!empty($last_order)) {
            return Redirect::to(route('orders.index'));
        }

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
        $products = Product::all()->toArray();
        $categories = Category::all()->toArray();

        $che = Product::where('cat_id', '=', 2)->get(); 
        if(!is_null($che)) { 
            $che = $che->toArray();
        } else {
            $che = array();
        }

        $user = Auth::user();
        $last_order = Order::where('updated_at', '>=', date('Y-m-d'))->orderBy('updated_at', 'asc')->where('user_id', '=', Auth::user()->id)->first();


        if(isset($last_order->id)) {
            // $prod_orders = ProductOrder::where('created_at', '>=', date('Y-m-d'))->where('order_id', '=', $last_order->id)->get();
            $prod_orders = DB::table('product_order')->join('products', 'product_order.product_id', '=', 'products.id')
                ->join('categories', 'categories.id', '=', 'products.cat_id')
                ->where('product_order.order_id','=',$last_order->id )
                ->get();
                // get(array())
        } else {
            $prod_orders = array();
        }

        // dd($prod_orders);

        return View::make('order.edit', compact('prod_orders', 'last_order', 'users', 'categories', 'che'));
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
                // remove old product order
                $old_products = ProductOrder::where('order_id', '=', $order->id)->delete();
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

        // return View::make('order.complete');
        return Redirect::to(route('order_complete'));
        }
        // dd(Input::all());

    	return Redirect::back()
            ->withInput();
    }

    public function complete() {
        $last_order = Order::where('updated_at', '>=', date('Y-m-d'))->orderBy('updated_at', 'asc')->groupBy('user_id')->get();

        if(!empty($last_order)) {
            $order_id = $last_order->id;
        } else {
            $order_id = 0;
        }
        View::share(compact('last_order'));
    	return View::make('order.complete', compact('order_id'));
    }

    public function update($id='') {
        
    }

    public function show($id=null) {
        $last_order = Order::where('updated_at', '>=', date('Y-m-d'))->where('user_id', '=', Auth::user()->id)->get();
        if(is_null($id)) {
            if(is_null($last_order)) {
                return Redirect::to('/');
            }
        }
        if(isset($last_order->id)) {
            // $prod_orders = ProductOrder::where('created_at', '>=', date('Y-m-d'))->where('order_id', '=', $last_order->id)->get();
            $prod_orders = DB::table('product_order')->join('products', 'product_order.product_id', '=', 'products.id')
                ->join('categories', 'categories.id', '=', 'products.cat_id')
                ->where('product_order.order_id','=',$last_order->id )
                ->get();
                // get(array())
        } else {
            $prod_orders = NULL;
        }
        // dd($prod_orders);

        View::share('prod_orders');
        return View::make('order.index');        
    }

}