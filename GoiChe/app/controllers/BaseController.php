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

	// Check if order session closed
	public function expired() {
		$end = OrderSession::where('updated_date', '>=', date('Y-m-d'))->first();
		$now = date('Y-m-d H:i:s');
		if(count($end) == 0) {
			return false; // end not set --> no expire due
		}
		if(strtotime($now) > strtotime($end)) {
			return true;
		}
		return false;
	}

}
