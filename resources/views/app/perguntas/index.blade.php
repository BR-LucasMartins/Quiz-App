@extends('app.layouts.layout')

@section('title', 'Perguntas')
@section('conteudo')

<div class="container">
    <div class="row">
        <div class="col-12 text-center fz-20">
            <h1> Perguntas</h1>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <a class="btn btn-primary float-end" href="{{route('pergunta.create')}}" rel="noopener noreferrer"> Criar </a>
        </div>
    </div>

        <table class="table table-striped m-4">
            <thead class="bg-dark text-white text-center">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Pergunta</th>
                <th scope="col">Respostas</th>
                <th scope="col">Categoria</th>
                <th scope="col">Dificuldade</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question ) 
                <tr>
                    <td colspan="" class="text-danger">{{$question->id}}</td>
                    <td>{{$question->question}}</td>
                    @php
                      $answers = explode(';', $question->options);
                    @endphp
                    <td>
                        @for ($i = 0;  $i < count($answers); $i++)
                          @if($answers[$i] != '')
                            {{$i + 1}} - {{$answers[$i]}} <br>
                          @endif
                        @endfor
                    </td>
                    <td>{{$question->categoria->category}}</td>

                    <td>
                      @if( $question->difficulty == 'easy')
                          Fácil
                      @elseif($question->difficulty == 'normal')
                        Normal
                      @elseif($question->difficulty == 'hard')   
                          Difícil 
                      @endif
                    </td>
                    <td> 
                        <div class="d-flex">
                            <a href="{{ route('pergunta.edit',['id' => $question->id]) }}" class="pr-2"> <img src="{{asset('assets/images/icons/editar.png')}}" alt="icon edit"> </a>
                            <a href="#"> <img src="{{asset('assets/images/icons/excluir.png')}}" data-toggle="modal" data-target="#exampleModal{{$question->id}}" alt="icon delete"> </a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Atenção </h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p class="fz-16">Aviso, essa ação é irreversível. Deseja realmente excluir o registro da base de dados ?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                <form id="form_{{$question->id}}" method="get" action="{{route('pergunta.delete', ['id' => $question->id ]) }}">
                                  <a class="btn btn-success" href="#" onclick="document.getElementById('form_{{$question->id}}').submit()"> Sim </a>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="mt-4 text-center mb-5">
              {{$questions->onEachSide(4)->links()}}
          </div>
</div>




@endsection