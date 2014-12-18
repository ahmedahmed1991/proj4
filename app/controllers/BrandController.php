<?php

class BrandController extends \BaseController {



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
		$brands = Brand::all();
		return View::make('brand_index')->with('brands',$brands);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('brand_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$brand = new Brand;
		$brand->name = Input::get('name');
		$brand->save();

		return Redirect::action('BrandController@index')->with('flash_message','Your brand been added.');
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
			$brand = Brand::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/brand')->with('flash_message', 'Brand not found');
		}

		return View::make('brand_show')->with('brand', $brand);
	
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
			$brand = Brand::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/brand')->with('flash_message', 'Brand not found');
		}

		# Pass with the $brand object so we can do model binding on the form
		return View::make('brand_edit')->with('brand', $brand);

	
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
			$brand = Brand::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/brand')->with('flash_message', 'brand not found');
		}

		$brand->name = Input::get('name');
		$brand->save();

		return Redirect::action('BrandController@index')->with('flash_message','Your brand has been saved.');

	
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
			$brand = Brand::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/brand')->with('flash_message', 'Brand not found');
		}

		# Note there's a `deleting` Model event which makes sure brand_car entries are also destroyed
		# See Brand.php for more details
		Brand::destroy($id);

		return Redirect::action('BrandController@index')->with('flash_message','Your brand has been deleted.');
	}


}
