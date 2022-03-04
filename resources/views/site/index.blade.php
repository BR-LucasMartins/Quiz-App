@extends('site/layouts.layout-site')

@section('title', 'Home')
@section('conteudo')

    <div class="fh5co-loader"></div>

	<aside id="fh5co-aside" role="sidebar" class="text-center" style="background-image: url('http://gifmania.com.br/wp-content/uploads/2020/08/interrogacoes.gif');">
	</aside>

	<div id="fh5co-main-content" class="bg-black-50 hv-100">
		<div class="row">
				<div class="col-12 text-center">
					<h1 class="title-home">Quiz App </h1>
				</div>
			</div>

			<div class="row">
				<div class="col-12 text-center">
					<p class="mt-30 fz-20 text-gray"> Selecione um Tema: </p>
				</div>
			</div>

			<form action="{{route('site.game')}}" method="post">
				@csrf
				<div class="row">
					<div class="col-12 text-center">
						<select class="form-select select-bg-yellow w-50 m-lg-auto" name="category" aria-label="Default select example">
							<option selected>Selecione uma categoria</option>
								@foreach ($categorias as $categoria ) 
									<option value="{{$categoria->id}}"> {{ $categoria->category }}</option>
								@endforeach
						</select>
					</div>
				</div>	
				
				<div class="row">
					<div class="col-12 text-center">
						<p class="mt-50 fz-20 text-gray"> Selecione a Dificuldade: </p>
					</div>
				</div>

				<div class="row mt-30">
					<div class="col-2 offset-3 text-center">
						<label class="radio-easy form-check-label" id="easy_label" for="easy">
							<input class="form-check-input d-none" type="radio" id="easy" name="difficulty" checked value="easy" required>
							Fácil
						</label>
					</div>
					<div class="col-2 text-center">
						<label class="radio-normal form-check-label" id="normal_label" for="normal">
							<input class="form-check-input d-none" type="radio" id="normal" name="difficulty" value="normal" required>
							Normal
						</label>
					</div>
					<div class="col-2 text-center">
						<label class="radio-hard form-check-label" id="hard_label" for="hard">
							<input class="form-check-input d-none" type="radio" id="hard" name="difficulty" value="hard" required>
							Difícil
						</label>
					</div>
				</div>

				<div class="row mt-80">
					<div class="col-12 text-center">
						<button type="submit" class="btn btn-submit"> Começar </button>
					</div>
				</div>
			</form>
			

		<div id="fh5co-footer">
			<div class="row">
				<div class="col-md-6">
					<ul id="fh5co-social">
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-instagram"></i></a></li>
						<li><a href="#"><i class="icon-google-plus"></i></a></li>
					</ul>
				</div>
				<div class="col-md-6 fh5co-copyright">
					<p>Designed by <a href="http://freehtml5.co/" target="_blank">Lucas Martins </a></p>
				</div>
			</div>
		</div>
		
	</div>
@endsection