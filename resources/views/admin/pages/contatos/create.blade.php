@extends('admin.layout.app')

@section('title', 'Cadastrar Novo Contato')
<div class='container'>
    <div class="card text-black bg-light mb-3" >
@section('content')

    <h1> <a href="{{route('contatos.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a> Cadastrar Novo Contato</h1>
{{-- caso n passe no validade do ProductController--}}


<form action="{{ route('contatos.store') }}" method = "post" enctype="multipart/form-data" class='form'>
    {{-- token do lavarel --}}
    @csrf
    {{--old('name') retorna o valro antigo do name antes de dar erro por ex --}}
    @include('admin.pages.contatos.partils.form')
</form>
    </div></div>   
@endsection