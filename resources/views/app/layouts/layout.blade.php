<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Super Gestão -  @yield('title') </title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('assets/css/new-style.css')}}">
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel=
		"stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;600&display=swap');
		</style>
    </head>

    <body>
	@include('app.partials.header')
	@include('app.partials.sidebar')

		<main style="margin-left: 280px; font-family: 'Spline Sans', sans-serif">
        	@yield('conteudo')
		</main>	

    
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