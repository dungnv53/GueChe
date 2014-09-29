<?php

class Order extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';

	/**
	* Get the password for the user.
	*
	* @return string
	*/

	public function productOrder()
    {
        return $this->hasMany('productOrder', 'order_id');
    }
	
	public function user()
    {
        return $this->belongsTo('User');
    }

    public function orderSession()
    {
        return $this->belongsTo('OrderSession', 'orderSession_id');
    }

    // TODO
    // Has many seem not work
    // So this func handle this
    // filter by date is option (only one order a day)
    public function getProdOrder() {
    	$prod_orders = ProductOrder::where('order_id', '=', $this->id)->where('updated_at', '>=', date('Y-m-d'))->get();
    	if(count($prod_orders)) {
    		return $prod_orders;
    	} else {
    		return false;
    	}
    }

}