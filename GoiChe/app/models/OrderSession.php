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

    public function getDeadline() {
    	$order_ss = OrderSession::where('end', '>=', date('Y-m-d'));
    	if(count($order_ss)) {
    		return date('Y-m-d H:i', $order_ss->end);
    	} else {
    		setDeadline(date('Y-m-d 17:30'));
    		return date('Y-m-d 17:30');
    	}
    }

    public function setDeadline($time) {
    	$order_ss = OrderSession::where('end', '>=', date('Y-m-d'));
    	if(count($order_ss)) {
    		$order_ss->end = $time;
    		$order_ss->touch();
    		$order_ss->save();
    	} else {
    		$order_ss = new OrderSession();
    		$order_ss->date = date('Y-m-d');
    		$order_ss->start = date('Y-m-d 12:00');   // fix me set start from 12h
    		$order_ss->end = $time;
    		$order_ss->touch();
    		$order_ss->save();
    	}
    }

}