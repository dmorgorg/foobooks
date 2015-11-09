<!doctype html>
<html>
<head>
	<title>
		{{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
		@yield('title','Foobooks')
	</title>

	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel='stylesheet' type='text/css'>
	<link href='https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/sandstone/bootstrap.min.css' rel='stylesheet' type='text/css'>
	<link href="/css/foobooks.css" type='text/css' rel='stylesheet'>

	{{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
		@yield('head')

	</head>
	<body>

		<header>
			<a href='/'>
				<img
				src='http://making-the-internet.s3.amazonaws.com/laravel-foobooks-logo@2x.png'
				style='width:300px'
				alt='Foobooks Logo'>
			</a>
		</header>

		<section>
			{{-- Main page content will be yielded here --}}
			@yield('content')
		</section>

		<footer>
			&copy; {{ date('Y') }} &nbsp;&nbsp;
			<a href='https://github.com/dmorgorg/foobooks' class='fa fa-github'> View on Github</a>
		</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

		{{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
		@yield('body')

	</body>
	</html>
