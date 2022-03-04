<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Quiz App | @yield('title') </title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/new-style.css')}}">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        @yield('conteudo')

    
    	<!-- jQuery -->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
	<!-- Count Down -->
	<script src="{{asset('assets/js/simplyCountdown.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('assets/js/main.js')}}"></script>
	
    </body>
</html>