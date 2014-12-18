@extends('_master')


@section('title')
	View Type
@stop


@section('content')

	<h2>Type: {{ $type->name }}</h2>

	<div>
	Created: {{ $type->created_at }}
	</div>

	<div>
	Last Updated: {{ $type->updated_at }}
	</div>

	{{---- Edit ----}}
	<a href='/type/{{ $type->id }}/edit'>Edit</a>

	{{---- Delete -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['TypeController@destroy', $type->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop
