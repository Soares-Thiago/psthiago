@extends('admin.layout.app')

@section('title', 'Editar habilidades')
<div class='container'>
    <div class="card text-black bg-light mb-3" >
@section('content')

<h1><a href="{{route('habilidades.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a> Editar habilidades: {{$habilidade->nome}}</h1>

<form action="{{ route('habilidades.update',$habilidade->id) }}" enctype="multipart/form-data" method = "post">
    @method('PUT')
    @include('admin.pages.habilidades.partils.form')
    </form>   
    </div></div>   
@endsection