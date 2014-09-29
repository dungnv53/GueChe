<?php

class ProductOrder extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_order';

	/**
	* Get the password for the user.
	*
	* @return string
	*/
	
	public function order()
    {
        return $this->belongsTo('Order');
    }

    public function product()
    {
        return $this->belongsTo('Product', 'product_id', 'id');
    }

    public function getProduct() {
    	$product = Product::where('id', '=', $this->product_id)->get();
    	if(!is_null($product)) {
    		return $product;
    	} else {
    		return false;
    	}
    }

    public function getListProduct() {
        $list = Product::find($this->product_id)->getProdList();
        if(count($list)) {
            return $list;
        }
        return false;
    }

    // Count all product order of this type
    public function countProduct() {
        $number = ProductOrder::where('product_id', '=', $this->product_id)->where('updated_at', '>=', date('Y-m-d'))->count();
        if($number) {
            return $number;
        } 
        return 0;
    }

}