<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarBrandTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brand_car', function($table) {

			# AI, PK
			# none needed

			# General data...
			$table->integer('car_id')->unsigned();
			$table->integer('brand_id')->unsigned();
			
			# Define foreign keys...
			$table->foreign('car_id')->references('id')->on('cars');
			$table->foreign('brand_id')->references('id')->on('brands');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('brand_car');
	}

}
