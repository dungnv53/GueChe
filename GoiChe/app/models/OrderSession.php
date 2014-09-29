<?php

class OrderSession extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'order_session';

	/**
	* Get the password for the user.
	*
	* @return string
	*/
	
	public function user()
    {
        return $this->hasMany('Order');
    }

}