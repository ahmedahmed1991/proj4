<?php

class Type extends Eloquent {

	/**
	* Identify relation between Type and Car
	*/
	public function car() {
        # Type has many cars
        # Define a one-to-many relationship.
        return $this->hasMany('car');
    }

    /**
	* When editing or adding a new car, we need a select dropdown of types to choose from
	* A select is easy to generate when you have a key=>value pair to work with
	* This method will generate a key=>value pair of type id => type name
	*
	* @return Array
	*/
    public static function getIdNamePair() {

		$types = Array();

		$collection = Type::all();

		foreach($collection as $type) {
			$types[$type->id] = $type->name;
		}

		return $types;
	}


}

