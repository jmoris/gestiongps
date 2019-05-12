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
@stop

