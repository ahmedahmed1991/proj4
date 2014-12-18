<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','Cars')</title>
	<meta charset='utf-8'>

	
	<link rel='stylesheet' href='/css/mystyle.css' type='text/css'>
	

	@yield('head')


</head>
<body>

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	<div class="page-header">
        <h1>Dealerships‎</h1>
    </div>

	<nav>
		<ul>
			
			<li><a href='/'>HOME</a></li>
			<li><a href='/car'>All Cars</a></li>
			
			<li><a href='/brand'>All Brands</a></li>
			<li><a href='/type'>All Types</a></li>

			<li><a href='/car/create'>+ Add Car</a></li>
			
		
			
		
		</ul>
	</nav>

	
	@yield('content')

	@yield('/body')

</body>
</html>





