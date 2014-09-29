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

    public function getCatName() {
    	$cat_name = Category::where('id', '=', $this->cat_id)->get();
    	if(count($cat_name)) {
    		return $cat_name->name;
    	} else {
    		return '';
    	}
    }

    // Get all product in same category
    public function getProdList() {
    	$list_pd = Product::where('cat_id', '=', $this->cat_id)->get();
    	if(count($list_pd)) {
    		return $list_pd;
    	} else {
    		return false;
    	}
    }

}
