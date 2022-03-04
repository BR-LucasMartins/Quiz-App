@extends('app.layouts.layout')

@section('title', 'Categoria')
@section('conteudo')

<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-4" >
            <h1> Categorias </h1>
        </div>
    </div>

    <div class="row mt-40">
        <div class="col-12 text-center ">
            <p class="category-paragraphy"> Adicionar nova Categoria </p>
            <form action="{{route('categoria.store')}}" method="post" class="text-center">
                @csrf
                <div>
                    <input class="form-control w-25 m-auto" type="text" name="category" placeholder="Categoria" autocomplete="off">
                    <span class="text-danger fz-12"> {{$errors->has('category') ? $errors->first('category') : ''}} </span>  
                </div>
                <button class="btn btn-primary mt-30" type="submit"> Cadastrar </button>
            </form>
        </div>
    </div>

    <div class="row mt-50">
        <div class="col-12 text-center ">
            <p class="category-paragraphy"> Todas as  Categorias </p>
            <div class="box-words">
               <div class="w-100 pt-2">
                   @foreach ($categorias as $categoria )
                        <span class="category-span mr-2"> {{$categoria->category}} <a class="btn text-white p-0" href="{{route('categoria.delete', ['id'=> $categoria->id])}}"> &times;</a> </span> 
                   @endforeach
               </div>
            </div>
        </div>
    </div>
</div>



@endsection