<!-- Se extiende el layout -->
@extends('layout.app')
<!-- Se asigna el titulo de la seccion -->
@section('titulo', 'Dispositivos')
<!-- Se agrega el contenido de la seccion -->
@section('contenido')
<!-- Se agrega una division card -->
<div class="card">
    <!-- Se asigna la cabezera del card -->
    <h5 class="card-header">Lista de Dispositivos</h5>
    <!-- Se agrega el cuerpo del card -->
    <div class="card-body">
        <div class="table-responsive">
            <!-- Division para boton de nuevo dispositivo -->
            <div class="form-group row mt-3">
                <div class="col-sm-12">
                    <a name="" id="" class="btn btn-primary float-right" href="/dispositivos/agregar"
                        role="button">Nuevo dispositivo</a>
                </div>
            </div>
            <!-- Se agrega tabla con los dispositivos -->
            <table id="tablaDatos" class="table table-sm table-hover">
                <thead class="text-left">
                    <tr>
                        <th>Nombre</th>
                        <th>IMEI</th>
                        <th>Estado</th>
                        <th width="15%">Acciones</th>
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
                        <td class="text-success">
                            <strong>Conectado</strong></td>
                        @endif
                        @if($d->status == 'unknown')
                        <td class="text-warning">
                            <strong>Desconocido</strong></td>
                        @endif

                        <td>
                            <a class="btn btn-sm btn-outline-primary" title="Ver información"
                                href="/dispositivos/ver/{{$d->uniqueId}}">
                                <i class="far fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-warning" title="Modificar información"
                                href="/dispositivos/editar/{{$d->uniqueId}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-danger" title="Borrar información" href="#"
                                onclick="if(confirm('¿Desea eliminar el dispositivo?')){event.preventDefault();$('#device-form{{$d->id}}').submit();}">
                                <i class="fas fa-trash"></i>
                            </a>
                            <form id="device-form{{$d->id}}" action="/dispositivos/eliminar/{{$d->id}}" method="POST">
                                @csrf
                            </form>
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