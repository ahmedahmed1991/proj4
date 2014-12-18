@extends('_master')

@section('title')
	Cars
@stop

@section('content')

	<h1>Cars</h1>

	


	@if($query)
		<h2>You searched for {{{ $query }}}</h2>
	@endif

	@if(sizeof($cars) == 0)
		No results
	@else

		@foreach($cars as $car)
			<section class='car'>

				<h2>{{ $car['name'] }}</h2>
				<p>
					@foreach($car['brands'] as $brand) <h3>{{'Brand:'}}
						<span class='brand'>{{{ $brand->name }}}</span></h3>
					@endforeach
				</p>

				<p>
					
						<h3>{{'Type:'}}{{ $car['type']['name'] }}</h3> 
						<h3>{{'Year:'}}({{$car['year']}})</h3>
						<h3>{{'color:'}} {{$car['color']}}</h3>
						<h3>{{'condition:'}} {{$car['condiction']}}</h3>
				</p>
				

				<p>
					<a href='/car/edit/{{$car['id']}}'>Edit</a>
				</p>

				
				
			</section>
		@endforeach

	@endif

@stop
