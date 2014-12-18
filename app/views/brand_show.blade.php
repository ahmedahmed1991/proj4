@extends('_master')


@section('title')
	View Brand
@stop


@section('content')

	<h2>Brand: {{ $brand->name }}</h2>

	<div>
	Created: {{ $brand->created_at }}
	</div>

	<div>
	Last Updated: {{ $brand->updated_at }}
	</div>

	{{---- Edit ----}}
	<a href='/brand/{{ $brand->id }}/edit'>Edit</a>

	{{---- Delete -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['BrandController@destroy', $brand->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop