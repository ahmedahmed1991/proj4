@extends('_master')

@section('title')
	Add a new car
@stop

@section('content')

	<h1>Add a new car</h1>

	{{ Form::open(array('url' => '/car/create')) }}


		{{ Form::label('name','Title') }}
		{{ Form::text('name'); }}

		{{ Form::label('type_id', 'Type') }}
		{{ Form::select('type_id',$types); }}

		{{ Form::label('color','Car color') }}
		{{ Form::text('color'); }}

		{{ Form::label('year','Year (YYYY)') }}
		{{ Form::text('year'); }}

		{{ Form::label('condiction','Condiction status') }}
		{{ Form::text('condiction'); }}

		

		@foreach($brands as $id => $brand)
			{{ Form::checkbox('brands[]', $id); }}  {{ $brand }}
 	
		@endforeach

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop
