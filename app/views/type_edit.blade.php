@extends('_master')

@section('title')
	Edit Type
@stop


@section('content')

	{{ Form::model($type, ['method' => 'put', 'action' => ['TypeController@update', $type->id]]) }}

		<h2>Update: {{ $type->name }}</h2>

		<div class='form-group'>
			{{ Form::label('name', 'Type Name') }}
			{{ Form::text('name') }}
		</div>

		{{ Form::submit('Update') }}

	{{ Form::close() }}


	{{---- DELETE -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['TypeController@destroy', $type->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop
