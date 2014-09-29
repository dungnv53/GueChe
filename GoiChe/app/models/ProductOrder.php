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
        return $this->belongsTo('Product');
    }

}