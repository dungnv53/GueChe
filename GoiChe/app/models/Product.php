<?php

class Product extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	protected $fillable = ['name','price','unit','cat_id'];
	/**
	* Get the password for the user.
	*
	* @return string
	*/
	

}