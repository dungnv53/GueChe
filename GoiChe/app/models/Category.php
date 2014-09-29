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
		$this->hasMany('Product');
	}

	public function getAllProduct($cat_id) {
		$products = Product::where('cat_id', '=', $this->id)->get();
		if(count($products)) {
			return $products;
		} else {
			return null;
		}
	}

}