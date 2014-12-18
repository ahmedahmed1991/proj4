<?php

class CarController extends \BaseController {


	/**
	*
	*/
	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
	}



	/**
	* Process the searchform
	* @return View
	*/
	public function getSearch() {

		return View::make('car_search');

	}


	/**
	* Display all cars
	* @return View
	*/
	public function getIndex() {

		# Format and Query are passed as Query Strings
		$format = Input::get('format', 'html');

		$query  = Input::get('query');

		$cars = Car::search($query);

		# Decide on output method...
		# Default - HTML
		if($format == 'html') {
			return View::make('car_index')
				->with('cars', $cars)
				->with('query', $query);
		}
		# JSON
		elseif($format == 'json') {
			return Response::json($cars);
		}
		# PDF (Coming soon)
		elseif($format == 'pdf') {
			return "This is the pdf (Coming soon).";
		}


	}


	/**
	* Show the "Add a car form"
	* @return View
	*/
	public function getCreate() {
		$types = Type::getIdNamePair();
		$brands = Brand::getIdNamePair();

    	return View::make('car_add')
    		->with('types',$types)
    		->with('brands',$brands);

	}

	/**
	* Process the "Add a car form"
	* @return Redirect
	*/
	public function postCreate() {

		# Instantiate the car model
		$car = new Car();
		

		$car->fill(Input::except('brands'));

		# Note this save happens before we enter any brands (next step)
		$car->save();

		foreach(Input::get('brands') as $brand) {

			# This enters a new row in the car_brand table
				$car->brands()->save(Brand::find($brand));

		}

		return Redirect::action('CarController@getIndex')->with('flash_message','Your car has been added.');

	}


	/**
	* Show the "Edit a car form"
	* @return View
	*/
	public function getEdit($id) {

		try {

			$types = Type::getIdNamePair();
		    $car    = Car::with('brands')->findOrFail($id);
		    $brands    = Brand::getIdNamePair();
		}
		catch(exception $e) {
		    return Redirect::to('/car')->with('flash_message', 'Car not found');
		}

    	return View::make('car_edit')
    		->with('car', $car)
    		->with('types', $types)
    		->with('brands', $brands);

	}


	/**
	* Process the "Edit a car form"
	* @return Redirect
	*/
	public function postEdit() {

		try {
			$car = Car::findOrFail(Input::get('id'));
	        $car = Car::with('brands')->findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/car')->with('flash_message', 'Car not found');
	    }

	    try {
		    # http://laravel.com/docs/4.2/eloquent#mass-assignment
		    $car->fill(Input::except('brands'));
		    $car->save();

		    # Update brands associated with this car
		    if(!isset($_POST['brands'])) $_POST['brands'] = array();
		    $car->updateBrands($_POST['brands']);

		   	return Redirect::action('CarController@getIndex')->with('flash_message','Your changes have been saved.');

		}
		catch(exception $e) {
	        return Redirect::to('/car')->with('flash_message', 'Error saving changes.');
	    }

	}


	/**
	* Process car deletion
	*
	* @return Redirect
	*/
	public function postDelete() {

		try {
	       
	         $car = Car::with('brands')->findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/car/')->with('flash_message', 'Could not delete car - not found.');
	    }

	    Car::destroy(Input::get('id'));


	    return Redirect::to('/car/')->with('flash_message', 'Car deleted.');

	}


	/**
	* Process a car search
	* Called w/ Ajax
	*/
	public function postSearch() {

		if(Request::ajax()) {

			$query  = Input::get('query');

			# We're demoing two possible return formats: JSON or HTML
			$format = Input::get('format');

			# Do the actual query
	        $cars  = Car::search($query);

	        # If the request is for JSON, just send the cars back as JSON
	        if($format == 'json') {
		        return Response::json($cars);
	        }
	        # Otherwise, loop through the results building the HTML View we'll return
	        elseif($format == 'html') {

		        $results = '';
				foreach($cars as $car) {
					# Created a "stub" of a view called car_search_result.php; all it is is a stub of code to display a car
					# For each car, we'll add a new stub to the results
					$results .= View::make('car_search_result')->with('car', $car)->render();
				}

				# Return the HTML/View to JavaScript...
				return $results;
			}
		}
	}



}
