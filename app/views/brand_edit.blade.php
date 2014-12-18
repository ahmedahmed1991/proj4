@extends('_master')

@section('title')
	Edit Brand
@stop


@section('content')

	{{ Form::model($brand, ['method' => 'put', 'action' => ['BrandController@update', $brand->id]]) }}

		<h2>Update: {{ $brand->name }}</h2>

		<div class='form-group'>
			{{ Form::label('name', 'Brand Name') }}
			{{ Form::text('name') }}
		</div>

		{{ Form::submit('Update') }}

	{{ Form::close() }}


	{{---- DELETE -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['BrandController@destroy', $brand->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop