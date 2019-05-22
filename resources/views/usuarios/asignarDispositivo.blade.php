@extends('layout.app')

@section('titulo', 'Asignar dispositivo a chofer')

@section('contenido')
<div class="card">
    <h5 class="card-header">Asignar dispositivo a usuario</h5>
    <div class="card-body">
        <div class="espacio-20"></div>
        <div class="col-md-8 offset-md-2">
            <form action="/usuarios/{{$usuario->id}}/asignar" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="usuario" value="{{$usuario->id}}">
                    <label for="chofer">Nombre usuario: {{$usuario->name}} </label>
                </div>
                <div>
                    <select name="dispositivo" class="form-control">
                        @foreach ($dispositivos as $dispositivo)
                        <option value="{{$dispositivo->id}}">{{$dispositivo->name}}({{$dispositivo->uniqueId}})</option>
                        @endforeach
                    </select>
                </div>

        </div>
    </div>
</div>
</form>
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="button" class="btn btn-danger" onclick="location.href='/usuarios'">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </div>
</div>
@endsection