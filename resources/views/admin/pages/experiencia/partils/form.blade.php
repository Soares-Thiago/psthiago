
@include('admin.includes.alerts') 
{{-- token do lavarel --}}
@csrf
{{--old('name') retorna o valro antigo do name antes de dar erro por ex --}}
<div class='form-group'>
    <input type="text" class='form-control' name="titulo" placeholder="Digite o titulo" value="{{$experiencia->titulo ?? old('titulo')}}">
</div>
<div class='form-group'>
    <textarea rows='5' class='form-control' name="mensagem" placeholder="Digite a mensagem">{{$experiencia->mensagem ??old('mensagem')}}</textarea>
</div>

<div class='form-group'>  
    <input type="file" class='form-control' name='foto'>
</div>

<button type="submit" class='btn btn-success'><i class="fas fa-plus"></i> Enviar</button>