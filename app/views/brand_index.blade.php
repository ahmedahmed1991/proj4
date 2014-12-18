@extends('_master')


@section('title')
	All the Brands
@stop


@section('content')

	<h2>Brands</h2>


	<a href='/brand/create'>+ Add a new brand</a>

	<br><br>

	@foreach($brands as $brand)

		<div>
			<a href='/brand/{{ $brand->id }}'>{{ $brand->name }}</a>
		</div>

	@endforeach

@stop