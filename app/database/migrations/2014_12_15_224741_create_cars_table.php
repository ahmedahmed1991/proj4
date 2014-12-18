<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function($table) {

			# AI, PK
			$table->increments('id');
			
			# created_at, updated_at columns
			$table->timestamps();
			
			# General data...
			$table->string('name');
			$table->integer('type_id')->unsigned(); # Important! FK has to be unsigned because the PK it will reference is auto-incrementing
			$table->string('color');
			$table->integer('year');
			$table->string('condiction');
			
			# Define foreign keys...
			$table->foreign('type_id')->references('id')->on('types');

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cars');
	}

}

