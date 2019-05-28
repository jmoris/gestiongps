@extends('layout.app')

@section('titulo', 'Lista de geocercas')

@section('contenido')
<div class="card">
    <!--El siguiente fragmento de codigo genera la vista de la parte superior de la interfaz, junto con un boton. -->
    <h5 class="card-header">Geocercas</h5>
    <div class="card-body">
        <div class="form-group row mt-3">
            <div class="col-sm-12">
                <a name="" id="" class="btn btn-primary float-right" href="/geocercas/agregar-geocerca"
                    role="button">Nueva geocerca</a>
            </div>
        </div>
        <!--Se crea la tabla que contendra las geocercas -->
        <div class="table-responsive col-sm-12">
            <table id="tablaDatos" class="table table-sm table-hover">
                <thead class="text-left">
                    <tr>
                    <!--Se detallan las clasificaciones de la tabla -->
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th width="15%">Acción</th>
                    </tr>
                </thead>
                <tbody>
                <!--Permite obtener datos de la API asociando este archivo geocercaController.php -->
                    @foreach($geocercas as $geocerca)
                    <tr>
                        <td>{{ $geocerca->id}}</td>
                        <td>{{ $geocerca->name}}</td>
                        <td>{{ $geocerca->description}}</td>
                        <td>
                            </a>
                            <!--Pone los botones en la tabla -->
                            <!--Boton que permite asignar la geocerca a un usuario -->
                            <a class="btn btn-sm btn-outline-primary" title="Asignar usuario"
                                href="/geocercas/asignar/{{$geocerca->id}}">
                                <i class="fas fa-user"></i>
                            </a>
                            <!--Boton que permite borrar una geocerca de la tabla -->
                            <a class="btn btn-sm btn-outline-danger" title="Borrar geocerca" href="#"
                                onclick="if(confirm('¿Desea eliminar la geocerca?')){event.preventDefault();$('#geofence-form{{$geocerca->id}}').submit();}">
                                <i class="fas fa-trash"></i>
                            </a>
                            <!--Permite la ejecucion de la funcionalidad del boton Borrar geocerca -->
                            <form id="geofence-form{{$geocerca->id}}" action="/geocercas/eliminar-geocerca/{{$geocerca->id}}" method="POST">
                            <form id="geofence-form{{$geocerca->id}}"
                                action="/geocercas/eliminar-geocerca/{{$geocerca->id}}" method="POST">
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop