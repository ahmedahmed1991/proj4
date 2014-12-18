<?php

class Brand extends Eloquent {

	# Enable fillable on the 'name' column so we can use the Model shortcut Create
	protected $fillable = array('name');

    public function cars() {
        # Brands belong to many Cars
        return $this->belongsToMany('Car');
    }


	# Model events...
	# http://laravel.com/docs/eloquent#model-events
	public static function boot() {

        parent::boot();

        static::deleting(function($brand) {
            DB::statement('DELETE FROM brand_car WHERE brand_id = ?', array($brand->id));
        });

	}


    public static function getIdNamePair() {

        $brands = Array();

        $collection = Brand::all();

        foreach($collection as $brand) {
            $brands[$brand->id] = $brand->name;
        }

        return $brands;
    }
}
