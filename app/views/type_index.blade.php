@extends('_master')


@section('title')
	All the Types
@stop


@section('content')

	<h2>Types</h2>


	<a href='/type/create'>+ Add a new type</a>

	<br><br>

	@foreach($types as $type)

		<div>
			<a href='/type/{{ $type->id }}'>{{ $type->name }}</a>
		</div>

	@endforeach

@stop
