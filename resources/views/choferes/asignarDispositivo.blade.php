@extends('layout.app')

@section('titulo', 'Asignar dispositivo a chofer')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Asignar dispositivo a chofer</h5>
        <div class="card-body">
                <div class="espacio-20"></div>
                <div class="col-md-8 offset-md-2">
				<form action="/choferes/asignarDispositivo/{{$c->id}}" method="POST">
                            @csrf 
                            <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" value="{{$c->name}}" class="form-control" name="nombre" id="nombre" placeholder="Ej: Jesus">
                            </div>
                            <div class="form-row">
                            <div class="row mt-3 "> 
                                <div class="col-sm-12"> 
                                    <button type="submit" class="btn btn-danger" onclick="location.href='/choferes'">Cancelar</button> 
                                    <button type="submit" class="btn btn-primary float-right" >Guardar</button> 
                                </div> 
                            </div>
                        </form>
                </div>
        </div>
@endsection