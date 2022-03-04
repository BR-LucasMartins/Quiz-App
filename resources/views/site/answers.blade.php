@extends('site/layouts.layout-site')

@section('title', 'Resultado')
@section('conteudo')

    <div class="fh5co-loader"></div>

	<aside id="fh5co-aside" role="sidebar" class="text-center" style="background-image: url('{{asset('assets/images/img_bg_1_gradient.jpg')}}');">
		
	</aside>

	<div id="fh5co-main-content" class="mt-3 pt-0">
        <div class="row container text-center mt-40">
            <h1 class="category-paragraphy"> Respostas </h1>
        </div>

        <div class="row container text-justify mb-10">
            @for ($i = 0; $i < count($answers); $i++)
                <div class="col-12 mt-30">
                    <p class="fz-18 text-black-50 mt-40 "> {{$i + 1}} - {{$answers[$i]['question']}} </p>

                    @php
                        $option = explode(';', $answers[$i]['options']);
                    @endphp

                    @for ($j = 0;  $j < count($option); $j++)
                        @if($option[$j] != '')
                            @if ($j == ($answers[$i]['option_selected']) && $j == ($answers[$i]['correct_answer'] -1)  )
                                <p class="fz-16 m-0 text-success"> {{$option[$j]}} <img class="ml-5" src="{{asset('assets/images/icons/true.png')}}"> </p>
                            @elseif($j == ($answers[$i]['option_selected']) && $j != ($answers[$i]['correct_answer'] -1))
                                <p class="fz-16 m-0 text-danger"> {{$option[$j]}} <img class="ml-5" src="{{asset('assets/images/icons/false.png')}}"> </p>
                            @else
                                <p class="fz-16 text-black-50 m-0"> {{$option[$j]}} </p>
                            @endif
                            
                         @endif
                    @endfor
                    
                    <div class="mt-30 ">
                        @for ($k = 0;  $k < count($option); $k++)
                            @if($k == ($answers[$i]['correct_answer'] -1))
                                <p class="fz-16 text-black-50 m-0"> Resposta correta: <span class="text-success">  {{$option[$k]}} </span>  </p>
                            @endif
                        @endfor
                    </div>
                     
                </div> 
            @endfor
    
        </div>
        <div class="col-12 text-center mb-40">
                <a class="btn btn-secondary fz-20 btn-result mr-5" href="javascript:history.back()" style="margin-right: 10px"> Voltar </a>
                <a class="btn btn-primary fz-20 btn-result" href="{{route('site.index')}}"> Novo jogo </a>
        </div>
	</div>
@endsection