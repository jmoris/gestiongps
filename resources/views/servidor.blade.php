@extends('layout.app')

@section('titulo', 'Pagina principal')

@section('contenido')

<div class="card-body">
    <h5 class="card-header">Ajustes del servidor:</h5>
    <div class="espacio-20"></div>
    <div class="col-md-8 offset-md-2">
    <form>
        <div class="form-group row">
            <div class="col-sm-4">Servidor en modo lectura</div>
            <div class="col-sm-8">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                        Sí
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">Dispositivos en modo lectura</div>
            <div class="col-sm-8">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                        Sí
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="latitud" class="col-sm-4 col-form-label">Latitud en el mapa</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="latitud" placeholder="Ej: -33.4726900">
            </div>
        </div>

        <div class="form-group row">
            <label for="longitud" class="col-sm-4 col-form-label">Longitud en el mapa</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="longitud" placeholder="Ej: -70.6472400">
            </div>
        </div>

        <div class="form-group row">
            <label for="zoom" class="col-sm-4 col-form-label">Zoom en el mapa</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="zoom" placeholder="Ej: 100">
            </div>
        </div>

        <div class="espacio-20"></div>
        <div class="form-group row">
            <div class="col-sm-11">
                <button type="submit" class="btn bg-azul text-white float-right" >Guardar</button>
            </div>
        </div>

    </form>
    </div>
</div>


@stop