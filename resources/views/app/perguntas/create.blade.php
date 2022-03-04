@extends('app.layouts.layout')

@section('title', 'Perguntas')
@section('conteudo')

<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-4">
            <h1> Perguntas</h1>
        </div>
    </div>

    <div class="row mt-40">
        <form action="{{route('pergunta.store')}}" method="post">
            <div class="col-12 text-center">
                <p class="category-paragraphy"> Criar Uma Nova Pergunta </p>
                @csrf
                <div>
                    <textarea class="form-control w-75 m-auto" name="question" rows="5" cols="4" placeholder="Digite ou Copie e cole a pergunta aqui!" autocomplete="off"> {{old('question')}} </textarea>
                    <span class="text-danger fz-12"> {{$errors->has('question') ? $errors->first('question') : ''}} </span>  
                </div>
            </div>

            <div class="col-12 mt-30">
                <div class="form-group w-75 m-auto">
                    <label class="pb-1 font-bold" for="category">Categoria</label>
                    <select  class="form-control" id="category" name="category">
                        <option value="">Selecione uma categoria</option>
                        @foreach ($categorias as $categoria ) 
							<option value="{{$categoria->id}}" {{old('category') == $categoria->id ? 'selected' : '' }}> {{ $categoria->category }}</option>
						@endforeach
                    </select>
                    <span class="text-danger fz-12"> {{$errors->has('category') ? $errors->first('category') : ''}} </span>  
                </div>
            </div>

            <div class="col-12 mt-30">
                <div class="form-group w-75 m-auto">
                    <label class="pb-1 font-bold" for="difficulty">Dificuldade da Questão</label>
                    <select  class="form-control" id="difficulty" name="difficulty">
                        <option value="">Selecione uma dificuldade</option>
                        <option value="easy" {{old('difficulty') == 'easy' ? 'selected' : '' }}>Fácil</option>
                        <option value="normal" {{old('difficulty') == 'normal' ? 'selected' : '' }}>Normal</option>
                        <option value="hard" {{old('difficulty') == 'hard' ? 'selected' : '' }}>Difícil</option>
                    </select>
                    <span class="text-danger fz-12"> {{$errors->has('difficulty') ? $errors->first('difficulty') : ''}} </span>  
                </div>
            </div>
            <div class="col-12 mt-30">
                <div class="form-group w-75 m-auto">
                    <label class="pb-1 font-bold" for="option-1"># 1° Opção</label>
                    <input type="text" class="form-control" id="option-1" name="option-1" value="{{old('option-1')}}" autocomplete="off">
                    <span class="text-danger fz-12"> {{$errors->has('option-1') ? $errors->first('option-1') : ''}} </span>  
                </div>
            </div>
            <div class="col-12 mt-30">
                <div class="form-group w-75 m-auto">
                    <label class="pb-1 font-bold" for="option-1"># 2° Opção</label>
                    <input type="text" class="form-control" id="option-2" name="option-2" value="{{old('option-2')}}" autocomplete="off">
                    <span class="text-danger fz-12"> {{$errors->has('option-2') ? $errors->first('option-2') : ''}} </span>  
                </div>
            </div>

            <div class="col-12 mt-30">
                <div class="form-group w-75 m-auto">
                    <label class="pb-1 font-bold" for="option-1"># 3° Opção</label>
                    <input type="text" class="form-control" id="option-3" name="option-3" value="{{old('option-3')}}" autocomplete="off">
                    <span class="text-danger fz-12"> {{$errors->has('option-3') ? $errors->first('option-3') : ''}} </span>  
                </div>
            </div>

            <div class="col-12 mt-30">
                <div class="form-group w-75 m-auto">
                    <label class="pb-1 font-bold" for="option-1"># 4° Opção</label>
                    <input type="text" class="form-control" id="option-4" name="option-4" value="{{old('option-4')}}" autocomplete="off">
                    <span class="text-danger fz-12"> {{$errors->has('option-4') ? $errors->first('option-4') : ''}} </span>  
                </div>
            </div>

            <div class="col-12 mt-30" id="option-5">
                <div class="form-group w-75 m-auto">
                    <label class="pb-1 font-bold" for="option-1"># 5° Opção</label>
                    <input type="text" class="form-control" name="option-5" value="{{old('option-5')}}" autocomplete="off">
                </div>
            </div>

            <div class="col-12 mt-30" id="option-5">
                <div class="form-group w-75 m-auto">
                    <label class="pb-1 font-bold">Resposta Correta </label>
                    <input type="number" class="form-control" name="corret_answer" placeholder="Informe o número da opção correta" value="{{old('correct_answer')}}" autocomplete="off" maxlength="1" min="1" max="5">
                    <span class="text-danger fz-12"> {{$errors->has('correct_answer') ? $errors->first('correct_answer') : ''}} </span>  
                </div>
            </div>

            <div class="col-12 text-center" style="margin-bottom: 20%;">
                <button class="btn btn-primary mt-30" type="submit"> Cadastrar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection