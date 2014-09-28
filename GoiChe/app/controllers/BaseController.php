<?php

class BaseController extends Controller {

	public function __construct() {
        $this->beforeFilter('@check_login');														
    }

  	public function check_login() {
	    if(!isset(Auth::user()->id)) {
	        return Redirect::to('/login');
	    }
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function home() {
		// date_default_timezone_set("Asia/Bangkok");
		return View::make('common.home');
	}

}
