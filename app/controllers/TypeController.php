<?php

class TypeController extends \BaseController {



	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		# Only logged in users are allowed here
		//$this->beforeFilter('auth');

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$types = Type::all();
		return View::make('type_index')->with('types',$types);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('type_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$type = new Type;
		$type->name = Input::get('name');
		$type->save();

		return Redirect::action('TypeController@index')->with('flash_message','Your type been added.');
		}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		try {
			$type = Type::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/type')->with('flash_message', 'Type not found');
		}

		return View::make('type_show')->with('type', $type);
	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try {
			$type = Type::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/type')->with('flash_message', 'Type not found');
		}

		# Pass with the $brand object so we can do model binding on the form
		return View::make('type_edit')->with('type', $type);

	
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try {
			$type = Type::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/type')->with('flash_message', 'type not found');
		}

		$type->name = Input::get('name');
		$type->save();

		return Redirect::action('TypeController@index')->with('flash_message','Your type has been saved.');

	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try {
			$type = Type::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/type')->with('flash_message', 'Type not found');
		}

		# Note there's a `deleting` Model event which makes sure brand_car entries are also destroyed
		Type::destroy($id);

		return Redirect::action('TypeController@index')->with('flash_message','Your type has been deleted.');
	}


}
