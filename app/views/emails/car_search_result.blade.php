<section>
	

	<h2>{{ $car['title'] }}</h2>

	<p>
	{{ $car['type']->name }} {{ $car['color'] }} {{ $car['year'] }} {{ $car['condiction'] }}
	</p>

	<p>
		@foreach($car['brands'] as $brand)
			{{ $brand->name }}
		@endforeach
	</p>

	
	
	<a href='/car/edit/{{ $car->id }}'>Edit</a>
</section>