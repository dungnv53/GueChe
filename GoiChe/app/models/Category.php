<?php

class Category extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	protected $fillable = ['name'];
	/**
	* Get the password for the user.
	*
	* @return string
	*/
	public function products()
	{
		return $this->hasMany('Product','cat_id');
	}

	// Get all product in same category
	public function getAllProduct() {
		$products = Product::where('cat_id', '=', $this->id)->get();
		if(count($products)) {
			return $products;
		} else {
			return null;
		}
	}

}