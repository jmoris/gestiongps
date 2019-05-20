@extends('layout.app')

@section('titulo', 'Dispositivos')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Lista de Dispositivos</h5>
        <div class="card-body">
            <div class="table-responsive">
                
                    <div class="form-group row mt-3">
                            <div class="col-sm-12">
                                <a name="" id="" class="btn btn-primary float-right" href="/dispositivos/agregar" role="button">Nuevo dispositivo</a>
                            </div>
                        </div>
                <table id="tablaDatos" class="table table-sm table-hover" >
                    <thead class="text-left">
                        <tr>
                            <th>Nombre</th>
                            <th>IMEI</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (is_array($dis))
                        @foreach($dis as $d)
                            <tr>
                            <td>{{ $d->name }}</td>
                            <td>
                                {{ $d->uniqueId}}

                            </td>
                            @if($d->status == 'offline')
                                <td class="text-danger">
                                    <strong>Desconectado</strong></td>
                            @endif
                            @if($d->status == 'online')
                                <td class="text-success" >
                                    <strong>Conectado</strong></td>
                            @endif
                            @if($d->status == 'unknow')
                                <td class="text-warning">
                                    <strong>Desconocido</strong></td>
                            @endif
        
                            <td>
                            <a class="btn btn-sm btn-outline-primary" title="Ver información" href="/dispositivos/ver/{{$d->uniqueId}}"  >
                                        ver
                            </a>
                            <a class="btn btn-sm btn-outline-warning" title="Modificar información" href="/dispositivos/editar/{{$d->uniqueId}}" >
                                        modificar
                            </a>
                            <a class="btn btn-sm btn-outline-danger" title="Borrar información" href="/dispositivos/modificar" >
                                        borrar
                            </a>
                            </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop