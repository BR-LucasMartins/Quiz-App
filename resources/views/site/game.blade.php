@extends('site/layouts.layout-site')

@section('title', 'Home')
@section('conteudo')

    <div class="fh5co-loader"></div>

	<aside id="fh5co-aside" role="sidebar" class="text-center" style="background-image: url('{{asset('assets/images/img_bg_1_gradient.jpg')}}');">
		
	</aside>

	<div id="fh5co-main-content" class="hv-100">
		<div class="row">
				<div class="col-12 text-center">
					<h1 class="title-home text-dark">Quiz App </h1>
				</div>
			</div>

			<div class="row mt-40">
				@foreach ($questions as $question)
					<h2 class="fz-18 font-bold text-black-50"> {{$question->question }}<h2>

					@php
						$answers = explode(';', $question->options);
					 @endphp

					<form class="mt-30" action="{{route('site.game.calc')}}" method="post">
						@csrf
						<input type="hidden" name="id" value="{{$question->id}}">
						<input type="hidden" name="correct_answer" value="{{$question->correct_answer -1}}">
						@for ($i = 0;  $i < count($answers); $i++)
							@if($answers[$i] != '')
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" name="option" value="{{$i}}">
									<label class="form-check-label fz-18 text-black-50 font-light" for="exampleCheck1"> {{$answers[$i]}} </label>
								</div>
							@endif
						@endfor
						
						@if($_SESSION['turn'] == 10)
							<button class="btn btn-lg btn-springgreen mt-30 float-end mr-5" type="submit"> Finalizar </button>	
						@else
							<button class="btn btn-lg btn-springgreen mt-30 float-end mr-5" type="submit"> Próximo </button>	
						@endif
					</form>
				@endforeach
			</div>

		<div id="fh5co-footer">
			<div class="row">
				<div class="col-md-6">
					<ul id="fh5co-social">
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-instagram"></i></a></li>
						<li><a href="#"><i class="icon-google-plus"></i></a></li>
						<li><a href="#"><i class="icon-pinterest-square"></i></a></li>
					</ul>
				</div>
				<div class="col-md-6 fh5co-copyright">
					<p>Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com" target="_blank">Unsplash</a></p>
				</div>
			</div>
		</div>
		
	</div>
@endsection