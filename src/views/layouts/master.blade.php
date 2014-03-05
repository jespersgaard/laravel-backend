<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Backend</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('packages/jeroen-g/laravel-backend/css/semantic.min.css'); }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('packages/jeroen-g/laravel-backend/css/backend.css'); }}">
</head>
<body>
		<div id="head-section">
			<div class="ui page grid">
				<div class="row">
				  <div class="column">

				  	@yield('header')

				  	@yield('menu')

				  </div>
				</div>
			</div>
		</div>
		

		<div class="ui page grid">
			<div class="row">
		  		<div class="column">
		  			<div id="content-section" class="ui basic segment">

		  				@yield('content')
		  					
		  			</div>
		  		</div>
			</div>
		</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script src="{{ asset('packages/jeroen-g/laravel-backend/js/semantic.min.js') }}"></script>

@yield('js')

</body>
</html>