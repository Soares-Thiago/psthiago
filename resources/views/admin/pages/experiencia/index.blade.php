<!-- importando o template-->
@extends('admin.layout.app')

<!-- importando o template, onde tem contetn ele substitui por isso-->
@section('title')
    Gestão de experiencia
@endsection

@section('content')
<br>
<div class="card bg-light mb-3">
    <div class="card-header">
        <h1><a href="{{route('admin')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a>Listagem de experiencia</h1>
    </div>
    <div class="card-body">
        <h5 class="card-title"><a href="{{ route('experiencia.create') }}" class='btn btn-success'><i class="fas fa-plus"></i> Cadastrar</a></h5>
    <form action="{{route('experiencia.search')}}" method="post" class='form form-inline'>
        @csrf
        <input type="text" class='form-control' name="filter" placeholder="Digite para pesquisar..." value="{{$filters['filter'] ?? ''}}">
        <button type="submite" class='btn btn-success'>OK</button>
    </form>
        <p class="card-text">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th width='100'>Foto</th>
                        <th>Título</th>
                        <th>Satus</th>
                        <th width='100'>Ações</th>
                    </tr>
                    
                </thead>
                <tbody>
                    @foreach ($experiencia as $experienciai)
                        <tr>
                            <td>
                                @if ($experienciai->imagem)
                            <img src = '{{url("storage/$experienciai->imagem")}}' alt='{{$experienciai->titulo}}' style='max-width:100px;'>
                                @endif
                            </td>
                            <td>{{$experienciai->titulo}}</td>
                            <td>{{$experienciai->status}}</td>
                            
                        <td><a class='btn-sm btn-primary' href='{{route('experiencia.show',$experienciai->id)}}'><i class="far fa-eye"></i></a>
                            <a class='btn-sm btn-success' href='{{route('experiencia.edit',$experienciai->id)}}'><i class="fas fa-pencil-alt"></i></a>
                        </td>
                        </tr>
                
                    @endforeach
        
                </tbody>
            </table>
            @if (isset($filters))
                {!! $experiencia->appends($filters)->links() !!}
            @else
                {!! $experiencia->links() !!}

                
            @endif
          
        </p>
    </div>
</div>
   
@endsection