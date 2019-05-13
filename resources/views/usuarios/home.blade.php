@extends('layout.app')

@section('titulo', 'Lista de usuarios')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Lista de Usuarios</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tablaDatos" class="table table-sm table-hover">
                    <thead class="text-left">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Administrador</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email}}</td>
                    <td>{{ $usuario->phone}}</td>
                    <td>{{ ($usuario->administrator) ? 'SI':'NO' }}</td>
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
