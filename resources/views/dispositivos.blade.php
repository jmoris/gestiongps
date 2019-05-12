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
                            <th>IMEI</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($dis as $d)
                        <tr>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->uniqueId}}</td>
                        @if($d->status == 'offline')
                            <td class="text-danger" >Desconectado</td>
                        @endif
                        @if($d->status == 'online')
                            <td class="text-success" >Conectado</td>
                        @endif
                        @if($d->status == 'unknow')
                            <td class="text-warning">Desconocido</td>
                        @endif
     
                        <td>
                        <a class="btn btn-sm btn-outline-primary" title="Ver información" href="#">
                            ver
                        </a>
                        </td>
                        </tr>
                    @endforeach
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

