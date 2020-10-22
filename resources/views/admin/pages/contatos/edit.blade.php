@extends('admin.layout.app')

@section('title', 'Editar Contatos')
<div class='container'>
    <div class="card text-black bg-light mb-3" >
@section('content')

<h1><a href="{{route('contatos.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a> Editar Contatos: {{$contato->name}}</h1>

<form action="{{ route('contatos.update',$contato->id) }}" enctype="multipart/form-data" method = "post">
    @method('PUT')
    @include('admin.pages.contatos.partils.form')
    </form>   
    </div></div>   
@endsection