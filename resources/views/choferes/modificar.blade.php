@extends('layout.app')

@section('titulo', 'Modificar chofer')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Editar datos usuario</h5>
        <div class="card-body">
                <div class="espacio-20"></div>
                <div class="col-md-8 offset-md-2">
                        <form action="/choferes/modificar/{{$c->id}}" method="POST">
                            @csrf 
                            <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" value="{{$c->name}}" class="form-control" name="nombre" id="nombre" placeholder="Ej: Jesus">
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail">RUT</label>
                            <input type="text"  value="{{$c->uniqueId}}" class="form-control" name="rut" id="rut" placeholder="Ej: 12345678-9">
                            </div>
                        </form>
                </div>
        </div>
@endsection