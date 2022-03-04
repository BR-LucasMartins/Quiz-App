@extends('site/layouts.layout-site')

@section('title', 'Resultado')
@section('conteudo')

    <div class="fh5co-loader"></div>

	<aside id="fh5co-aside" role="sidebar" class="text-center" style="background-image: url('{{asset('assets/images/img_bg_1_gradient.jpg')}}');">
		
	</aside>

	<div id="fh5co-main-content" class="hv-100 mt-3 pt-0">
        <div class="row container mt-40">

            @if ($media == 1)
                @include('site.partials.result.first') 
            @elseif($media == 2)
                @include('site.partials.result.second') 
            @elseif($media == 3)
                @include('site.partials.result.third') 
            @endif
            
            <div class="col-12 text-center mt-5">
                <a class="btn btn-danger fz-20 btn-result mr-5" href="{{route('site.game.answers')}}" style="margin-right: 10px"> Visualizar respostas</a>
                <a class="btn btn-primary fz-20 btn-result" href="{{route('site.index')}}"> Novo jogo </a>
            </div>
        </div>
            
			

		
		
	</div>
@endsection