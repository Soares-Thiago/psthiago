@extends('admin.layout.app')

@section('title', 'Cadastrar Novo Sobre')
<div class='container'>
    <div class="card text-black bg-light mb-3" >
@section('content')

    <h1> <a href="{{route('sobre.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a> Cadastrar Novo Sobre</h1>
{{-- caso n passe no validade do ProductController--}}


<form action="{{ route('sobre.store') }}" method = "post" enctype="multipart/form-data" class='form'>
    {{-- token do lavarel --}}
    @csrf
    {{--old('name') retorna o valro antigo do name antes de dar erro por ex --}}
    @include('admin.pages.sobre.partils.form')
</form>
    </div></div>   
@endsection