@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	<h1>Edit</h1>
	<h2>{{{ $car['title'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/car/edit')) }}

		{{ Form::hidden('id',$car['id']); }}

		<div class='form-group'>
			{{ Form::label('name','Title') }}
			{{ Form::text('name',$car['name']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('type_id', 'Type') }}
			{{ Form::select('type_id', $types, $car->type_id); }}
		</div>

		<div class='form-group'>
			{{ Form::label('color','Car color') }}
			{{ Form::text('color',$car['color']); }}
		</div>

		<div class='form-group'>
			
			{{ Form::label('year','Year (YYYY)') }}
			{{ Form::text('year',$car['year']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('condiction','Condition status') }}
			{{ Form::text('condiction',$car['condiction']); }}
		</div>
		<div class='form-group'>
			@foreach($brands as $id => $brand)
				{{ Form::checkbox('brands[]', $id, $car->brands->contains($id)); }} {{ $brand }}
			@endforeach
			</div>

		


		

		{{ Form::submit('Save'); }}

	{{ Form::close() }}

	<div>
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/car/delete')) }}
			{{ Form::hidden('id',$car['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
		<h5>Before u delete the car,You have to take off the right check symbol and save it 
			then u can delete the car. </h5>
	</div>


@stop
