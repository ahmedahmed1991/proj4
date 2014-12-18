@extends('_master')

@section('title')
	add a new Brand
@stop


@section('content')

	<h1>Create a Brand</h1>

	{{ Form::open(array('action' => 'BrandController@store')) }}

		<div>
			{{ Form::label('name','Brand Name') }}
			{{ Form::text('name') }}
		</div>

		<br><br>
		{{ Form::submit('Add Brand') }}

	{{ Form::close() }}

@stop