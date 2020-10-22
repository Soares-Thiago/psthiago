<!-- importando o template-->
@extends('admin.layout.app')

<!-- importando o template, onde tem contetn ele substitui por isso-->
@section('title')
    Gestão de habilidades
@endsection

@section('content')
<br>
<div class="card bg-light mb-3">
    <div class="card-header">
        <h1><a href="{{route('admin')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a>Listagem de habilidades</h1>
    </div>
    <div class="card-body">
        <h5 class="card-title"><a href="{{ route('habilidades.create') }}" class='btn btn-success'><i class="fas fa-plus"></i> Cadastrar</a></h5>
    <form action="{{route('habilidades.search')}}" method="post" class='form form-inline'>
        @csrf
        <input type="text" class='form-control' name="filter" placeholder="Digite para pesquisar..." value="{{$filters['filter'] ?? ''}}">
        <button type="submite" class='btn btn-success'>OK</button>
    </form>
        <p class="card-text">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th width='100'>Foto</th>
                        <th>Nome</th>
                        <th>Status</th>
                        <th width='100'>Ações</th>
                    </tr>
                    
                </thead>
                <tbody>
                    @foreach ($habilidades as $habilidade)
                        <tr>
                            <td>
                                @if ($habilidade->imagem)
                            <img src = '{{url("storage/$habilidade->imagem")}}' alt='{{$habilidade->nome}}' style='max-width:100px;'>
                                @endif
                            </td>
                            <td>{{$habilidade->nome}}</td>
                            <td>{{$habilidade->status}}</td>
                            
                        <td><a class='btn-sm btn-primary' href='{{route('habilidades.show',$habilidade->id)}}'><i class="far fa-eye"></i></a>
                            <a class='btn-sm btn-success' href='{{route('habilidades.edit',$habilidade->id)}}'><i class="fas fa-pencil-alt"></i></a>
                        </td>
                        </tr>
                
                    @endforeach
        
                </tbody>
            </table>
            @if (isset($filters))
                {!! $habilidades->appends($filters)->links() !!}
            @else
                {!! $habilidades->links() !!}

                
            @endif
          
        </p>
    </div>
</div>
   
@endsection