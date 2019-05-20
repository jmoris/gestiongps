@extends('layout.app')

@section('titulo', 'Modificar chofer')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Editar datos chofer</h5>
        <div class="card-body">
                <div class="espacio-20"></div>
                <div class="col-md-8 offset-md-2">
				<form action="/choferes/modificar/{{$chofer->id}}" method="POST">
                            @csrf 
                            <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" value="{{$chofer->name}}" class="form-control" name="nombre" id="nombre" placeholder="Ej: Jesus">
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="uniqueId">RUT</label>
                            <input type="text"  value="{{$chofer->uniqueId}}" class="form-control" name="rut" id="rut" placeholder="Ej: 12345678-9">
                            </div>
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