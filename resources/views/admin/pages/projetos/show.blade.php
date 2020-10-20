<!DOCTYPE html>
@extends('admin.layout.app')

@section('title')
Detalhes do Projeto
@endsection
<div class='container'>
    <div class="card text-black bg-light mb-3" >
    @section('content')
        <h1><a href="{{route('projetos.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a>  Detalhes do projeto</h1>
    <hr>
    
    <p>Nome: {{$projetos->nome}}</p>
    <p>Descrição: {{$projetos->descricao}}</p>
    <p>Link: {{$projetos->link}}</p>
     
    @if ($projetos->status == "A")
    <form action='{{route('projetos.desactive',$projetos->id)}}' method='POST'>
        @csrf
        @method('PUT')
        <button type='submit' class='btn btn-danger'> <i class="fas fa-trash-alt"></i> Desativar</button>
    </form>
    @endif
    @if ($projetos->status == "I")
        <form action='{{route('projetos.active',$projetos->id)}}' method='POST'>
            @csrf
            @method('PUT')
            <button type='submit' class='btn btn-info'> <i class="fas fa-check"></i> Ativar</button>
        </form>
    @endif
    </div><br>  
</div>  
@endsection    

