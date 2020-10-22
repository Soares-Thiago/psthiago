<!DOCTYPE html>
@extends('admin.layout.app')

@section('title')
Detalhes da Habilidade
@endsection
<div class='container'>
    <div class="card text-black bg-light mb-3" >
    @section('content')
        <h1><a href="{{route('habilidades.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a>  Detalhes da habilidade</h1>
    <hr>
    
    <p>Tipo: {{$habilidades->tipo}}</p>
    <p>Nome: {{$habilidades->nome}}</p>
     
    @if ($habilidades->status == "A")
    <form action='{{route('habilidades.desactive',$habilidades->id)}}' method='POST'>
        @csrf
        @method('PUT')
        <button type='submit' class='btn btn-danger'> <i class="fas fa-trash-alt"></i> Desativar</button>
    </form>
    @endif
    @if ($habilidades->status == "I")
        <form action='{{route('habilidades.active',$habilidades->id)}}' method='POST'>
            @csrf
            @method('PUT')
            <button type='submit' class='btn btn-info'> <i class="fas fa-check"></i> Ativar</button>
        </form>
    @endif
    </div><br>  
</div>  
@endsection    

