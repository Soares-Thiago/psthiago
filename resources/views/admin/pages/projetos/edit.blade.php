@extends('admin.layout.app')

@section('title', 'Editar Produto')
<div class='container'>
    <div class="card text-black bg-light mb-3" >
@section('content')

<h1><a href="{{route('projetos.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a> Editar Projeto: {{$projeto->name}}</h1>

<form action="{{ route('projetos.update',$projeto->id) }}" enctype="multipart/form-data" method = "post">
    @method('PUT')
    @include('admin.pages.projetos.partils.form')
    </form>   
    </div></div>   
@endsection