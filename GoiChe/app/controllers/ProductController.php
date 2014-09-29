<?php
class ProductController extends BaseController {

    public function __construct() {
    														
    }
	
    public function leftmenu() {
    }

    public function loginCheck() {
    }

    public function index() {
       $products = Product::paginate(15);
   
       return View::make('product.index',compact('products'));
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

    public function edit($id) {
        $product = Product::with('category')->whereId($id)->first();
        $categories = Category::all()->toArray();
        return View::make('product.edit',compact('categories','product'));
    }

    public function store() {

        $product = [
                        'name'  => Input::get('name'),
                        'price' => Input::get('price'),
                        'unit'  => Input::get('unit'),
                        'cat_id' => Input::get('cat_id')
        ];
        $rule = [
                    'name'  => 'required|min:3',
                    'price' => 'required|integer',
                    'unit'  => 'required',
                    'cat_id' => 'required'
        ];

        $valid = Validator::make($product,$rule);
        if($valid->passes()){
            $product = new Product($product);
            $product->save();
            return Redirect::route('products.index');
        }else
            return Redirect::back()->withErrors($valid)->withInput();
    }

    public function complete() {
    	return View::make('account.complete');
    }

    public function update(Product $product) {
        $data = [
                        'name'  => Input::get('name'),
                        'price' => Input::get('price'),
                        'unit'  => Input::get('unit'),
                        'cat_id' => Input::get('cat_id')
        ];
        $rule = [
                    'name'  => 'required|min:3',
                    'price' => 'required|integer',
                    'unit'  => 'required',
                    'cat_id' => 'required'
        ];

        $valid = Validator::make($data,$rule);
        if($valid->passes()){
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->unit = $data['unit'];
            $product->cat_id = $data['cat_id'];
            if(count($product->getDirty())>0)
            {
                $product->save();
                return Redirect::route('products.index');
            }
            else
                return Redirect::back();
        }
        else
            return Redirect::back()->withErrors($valid)->withInput();
    }

    public function delete(Product $product)
    {
        $product->delete();
        return Redirect::route('products.index');
    }

    public function show($id) {
        
    }

    public function getList() {
        $cat_id = Input::get('cat_id');
        if(!$cat_id) {
            return Response::json('');
        }
        $cat = Category::find($cat_id);
        if(!is_null($cat))  {
            return Response::json($cat->getAllProduct());
        } else {
            return Response::json('');
        }
    }
}
