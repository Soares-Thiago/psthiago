<!DOCTYPE html>
@extends('admin.layout.app')

@section('title')
Detalhes do Sobre
@endsection
<div class='container'>
    <div class="card text-black bg-light mb-3" >
    @section('content')
        <h1><a href="{{route('sobre.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a>  Detalhes do sobre</h1>
    <hr>
    
    <p>Titulo: {{$sobre->titulo}}</p>
    <p>mensagem: {{$sobre->mensagem}}</p>
     
    @if ($sobre->status == "A")
    <form action='{{route('sobre.desactive',$sobre->id)}}' method='POST'>
        @csrf
        @method('PUT')
        <button type='submit' class='btn btn-danger'> <i class="fas fa-trash-alt"></i> Desativar</button>
    </form>
    @endif
    @if ($sobre->status == "I")
        <form action='{{route('sobre.active',$sobre->id)}}' method='POST'>
            @csrf
            @method('PUT')
            <button type='submit' class='btn btn-info'> <i class="fas fa-check"></i> Ativar</button>
        </form>
    @endif
    </div><br>  
</div>  
@endsection    

