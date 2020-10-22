@extends('admin.layout.app')

@section('title', 'Editar experiencia')
<div class='container'>
    <div class="card text-black bg-light mb-3" >
@section('content')

<h1><a href="{{route('experiencia.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a> Editar experiencia: {{$experiencia->titulo}}</h1>

<form action="{{ route('experiencia.update',$experiencia->id) }}" enctype="multipart/form-data" method = "post">
    @method('PUT')
    @include('admin.pages.experiencia.partils.form')
    </form>   
    </div></div>   
@endsection