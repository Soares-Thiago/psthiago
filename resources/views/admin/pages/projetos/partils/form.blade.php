
@include('admin.includes.alerts') 
{{-- token do lavarel --}}
@csrf
{{--old('name') retorna o valro antigo do name antes de dar erro por ex --}}
<div class='form-group'>
    <input type="text" class='form-control' name="nome" placeholder="Digite o nome" value="{{$projeto->nome ?? old('nome')}}">
</div>
<div class='form-group'>
    <textarea rows='5' class='form-control' name="descricao" placeholder="Digite a descrição">{{$projeto->descricao ??old('descricao')}}</textarea>
</div>

<div class='form-group'>
    <input type="text" class='form-control' name="link" placeholder="Digite o link" value="{{$projeto->link ??old('link')}}">
</div>

<div class='form-group'>  
    <input type="file" class='form-control' name='foto'>
</div>

<button type="submit" class='btn btn-success'><i class="fas fa-plus"></i> Enviar</button>