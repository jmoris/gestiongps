@extends('layout.app')

@section('titulo', 'Nuevo Chofer')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Nuevo chofer</h5>
        <div class="card-body">
            <div class="espacio-20"></div>
            <div class="col-md-8 offset-md-2">
            <form method="POST" action="/choferes">     
                @csrf       
                <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nombre" placeholder="El Chofer de Jesus">
                    </div>
                </div>
                    
                <div class="form-group row">
                    <label for="rut" class="col-sm-4 col-form-label">RUT</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="rut" placeholder="Ej:">
                    </div>
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