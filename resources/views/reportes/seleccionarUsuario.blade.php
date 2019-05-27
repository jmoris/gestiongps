@extends('layout.app')

@section('titulo', 'Seleccion de usuario')

@section('contenido')
<div class="card">
    <h5 class="card-header">Seleccion de usuario</h5>
    <div class="card-body">
        <div class="espacio-20"></div>
        <div class="col-md-8 offset-md-2">
                <div lass="form-group">
                    <label for="usuario">Usuario: </label>
                    <select id="usuario" name="usuario" class="form-control">
                        @foreach ($usuarios as $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                        @endforeach
                    </select>
                </div>
        </div>
    </div>
</div>
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="button" class="btn btn-danger" onclick="location.href='/choferes'">Cancelar</button>
        <button type="button" class="btn btn-primary float-right" onclick="location.href='/reportes/usuarios/' + $('#usuario option:selected').val();">Guardar</button>
    </div>
</div>
</form>
@stop
