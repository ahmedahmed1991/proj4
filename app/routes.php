<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/classes', function() {

	echo Paste\Pre::render(get_declared_classes(),'');

});


Route::get('/', 'IndexController@getIndex');


Route::get('/car', 'CarController@getIndex');

Route::get('/car/edit/{id}', 'CarController@getEdit');
Route::post('/car/edit', 'CarController@postEdit');

Route::get('/car/create', 'CarController@getCreate');
Route::post('/car/create', 'CarController@postCreate');

Route::post('/car/delete', 'CarController@postDelete');

Route::get('/car/digest', 'CarController@getDigest');

## Ajax examples
Route::get('/car/search', 'CarController@getSearch');
Route::post('/car/search', 'CarController@postSearch');


Route::resource('brand', 'BrandController');
Route::resource('type', 'TypeController');
