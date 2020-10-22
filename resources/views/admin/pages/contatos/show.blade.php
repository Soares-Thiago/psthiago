<!DOCTYPE html>
@extends('admin.layout.app')

@section('title')
Detalhes do Contato
@endsection
<div class='container'>
    <div class="card text-black bg-light mb-3" >
    @section('content')
        <h1><a href="{{route('contatos.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a>  Detalhes do contato</h1>
    <hr>
    
    <p>Nome: {{$contatos->nome}}</p>
    <p>Link: {{$contatos->link}}</p>
     
    @if ($contatos->status == "A")
    <form action='{{route('contatos.desactive',$contatos->id)}}' method='POST'>
        @csrf
        @method('PUT')
        <button type='submit' class='btn btn-danger'> <i class="fas fa-trash-alt"></i> Desativar</button>
    </form>
    @endif
    @if ($contatos->status == "I")
        <form action='{{route('contatos.active',$contatos->id)}}' method='POST'>
            @csrf
            @method('PUT')
            <button type='submit' class='btn btn-info'> <i class="fas fa-check"></i> Ativar</button>
        </form>
    @endif
    </div><br>  
</div>  
@endsection    

