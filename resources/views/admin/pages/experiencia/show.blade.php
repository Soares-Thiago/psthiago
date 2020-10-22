<!DOCTYPE html>
@extends('admin.layout.app')

@section('title')
Detalhes do experiencia
@endsection
<div class='container'>
    <div class="card text-black bg-light mb-3" >
    @section('content')
        <h1><a href="{{route('experiencia.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a>  Detalhes do experiencia</h1>
    <hr>
    
    <p>Titulo: {{$experiencia->titulo}}</p>
    <p>mensagem: {{$experiencia->mensagem}}</p>
     
    @if ($experiencia->status == "A")
    <form action='{{route('experiencia.desactive',$experiencia->id)}}' method='POST'>
        @csrf
        @method('PUT')
        <button type='submit' class='btn btn-danger'> <i class="fas fa-trash-alt"></i> Desativar</button>
    </form>
    @endif
    @if ($experiencia->status == "I")
        <form action='{{route('experiencia.active',$experiencia->id)}}' method='POST'>
            @csrf
            @method('PUT')
            <button type='submit' class='btn btn-info'> <i class="fas fa-check"></i> Ativar</button>
        </form>
    @endif
    </div><br>  
</div>  
@endsection    

