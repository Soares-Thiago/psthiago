@extends('admin.layout.app')

@section('title', 'Cadastrar Novo Habilidades')
<div class='container'>
    <div class="card text-black bg-light mb-3" >
@section('content')

    <h1> <a href="{{route('habilidades.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a> Cadastrar Nova Habilidade</h1>
{{-- caso n passe no validade do ProductController--}}


<form action="{{ route('habilidades.store') }}" method = "post" enctype="multipart/form-data" class='form'>
    {{-- token do lavarel --}}
    @csrf
    {{--old('name') retorna o valro antigo do name antes de dar erro por ex --}}
    @include('admin.pages.habilidades.partils.form')
</form>
    </div></div>   
@endsection