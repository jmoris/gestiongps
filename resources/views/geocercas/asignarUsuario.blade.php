@extends('layout.app')

@section('titulo', 'Asignar geocerca a usuario')

@section('contenido')
<div class="card">
    <!--Genera la parte superior de la interfaz -->
    <h5 class="card-header">Asignar geocerca a usuario</h5>
    <div class="card-body">
        <div class="espacio-20"></div>
        <div class="col-md-8 offset-md-2">
            <!--La siguiente linea de codigo permite la captura de elementos del teclado y derivarlos a otro archivo -->
            <form action="/geocercas/asignar/{{$geocerca->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="geocerca" value="{{$geocerca->id}}">
                    <label for="geocerca">Nombre geocerca: {{$geocerca->name}} </label>
                </div>
                <!--Texto puesto en la interfaz junto a un cuadro de seleccion de usuario -->
                <div>
                    <select name="usuario" class="form-control">
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
    <!--Boton para cancelar la asignacion a un usuario -->
        <button type="button" class="btn btn-danger" onclick="location.href='/geocercas'">Cancelar</button>
        <!--Boton para guardar la asignacion a un usuario -->
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </div>
</div>
</form>
@endsection