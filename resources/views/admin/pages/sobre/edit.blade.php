@extends('admin.layout.app')

@section('title', 'Editar Sobre')
<div class='container'>
    <div class="card text-black bg-light mb-3" >
@section('content')

<h1><a href="{{route('sobre.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a> Editar Sobre: {{$sobre->titulo}}</h1>

<form action="{{ route('sobre.update',$sobre->id) }}" enctype="multipart/form-data" method = "post">
    @method('PUT')
    @include('admin.pages.sobre.partils.form')
    </form>   
    </div></div>   
@endsection