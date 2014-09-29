<?php

class Product extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	* Get the password for the user.
	*
	* @return string
	*/

	public function category(){
		return $this->belongsTo('Category','cat_id');
	}

}