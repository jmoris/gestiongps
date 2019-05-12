@extends('layout.app')

@section('titulo', 'Dispositivos')


@section('contenido')
    <div class="card">
        <h5 class="card-header">Lista de Dispositivos</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tablaDatos" class="table table-sm table-hover">
                    <thead class="text-left">
                        <tr>
                            <th>Nombre</th>
                            <th>Imei</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="form-group row mt-3">
        <div class="col-sm-12">
            <a name="" id="" class="btn btn-primary" href="dispositivos/ingresar" role="button">Nuevo</a>
        </div>
    </div>
@stop

