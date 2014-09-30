<?php

class SessionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$sessions = OrderSession::orderBy('id','desc')->paginate(15);
		return View::make('session.index', compact('sessions'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('session.create');
	}

	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$session = new OrderSession();
		$session->date = Input::get('date');
		$session->start = Input::get('start');
		$session->end = Input::get('end');
		$session->save();
		return Redirect::route('dashboard.index');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$session = OrderSession::find($id);
		return View::make('session.edit',compact('session'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(OrderSession $session)
	{
		//
		$session->date = Input::get('date');
		$session->start = Input::get('start');
		$session->end  = Input::get('end');
		$session->save();
		return Redirect::route('session.index');
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
