@extends('_master')

@section('title')
	add a new Type
@stop


@section('content')

	<h1>Create a Type</h1>

	{{ Form::open(array('action' => 'TypeController@store')) }}

		<div>
			{{ Form::label('name','Type Name') }}
			{{ Form::text('name') }}
		</div>

		<br><br>
		{{ Form::submit('Add Type') }}

	{{ Form::close() }}

@stop
