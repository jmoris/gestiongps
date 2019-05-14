@extends('layout.app')

@section('titulo', 'Lista de usuarios')

@section('contenido')
<a type="button" href="/usuarios/agregar-usuario" class="btn btn-primary" style="margin: 0px 10px 10px 0px">Agregar usuario</a>
    <div class="card">
        <h5 class="card-header">Usuarios</h5>
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
                        <a class="btn btn-sm btn-outline-primary" title="Ver información" href="#">ver</a>
                        <a class="btn btn-sm btn-outline-danger" title="eliminar" href="#">borrar</a>
                        <a class="btn btn-sm btn-outline-secondary" title="modificar" href="/usuarios/editar-usuario">modificar</a>
                    </td>
                </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
