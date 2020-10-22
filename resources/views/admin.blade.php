@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('projetos.index')}}" class='btn btn-primary'>  Projetos</a>
                    <a href="{{route('contatos.index')}}" class='btn btn-primary'>  Contatos</a>
                    <a href="{{route('habilidades.index')}}" class='btn btn-primary'>  Habilidades</a> 
                    <a href="{{route('sobre.index')}}" class='btn btn-primary'>  Sobre</a>                               
                    <a href="{{route('experiencia.index')}}" class='btn btn-primary'>  Experiência</a>                               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
