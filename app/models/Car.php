<?php

class Car extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * Car belongs to Type
    * Define an inverse one-to-many relationship.
    */
	public function type() {

        return $this->belongsTo('Type');

    }

    /**
    * Cars belong to many Brands
    */
    public function brands() {

        return $this->belongsToMany('Brand');

    }

        public function updatebrands($new = array()) {
        
        foreach($new as $brand) {
            if(!$this->brands->contains($brand)) {
                $this->brands()->save(Brand::find($brand));
            }
        }
        foreach($this->brands as $brand) {
            if(!in_array($brand->pivot->brand_id,$new)) {
                $this->brands()->detach($brand->id);
            }
        }
    }

    /**
    * Search among cars, types and brands
    * @return Collection
    */
    public static function search($query) {

        # If there is a query, search the library with that query
        if($query) {

            # Eager load brands and type
            $cars = Car::with('brands','type')
            ->whereHas('type', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhereHas('brands', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhere('title', 'LIKE', "%$query%")
            ->orWhere('year', 'LIKE', "%$query%")
            ->get();

            # Note on what `use` means above:
            # Closures may inherit variables from the parent scope.
            # Any such variables must be passed to the `use` language construct.

        }
        # Otherwise, just fetch all cars
        else {
            # Eager load brands and type
            $cars = Car::with('brands','type')->get();
        }

        return $cars;
    }



    }
