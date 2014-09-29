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
	
	public function category()
    {
        return $this->belongsTo('Category');
    }

    public function getCatName() {
    	$cat_name = Category::where('id', '=', $this->cat_id)->get();
    	if(count($cat_name)) {
    		return $cat_name->name;
    	} else {
    		return '';
    	}
    }

}