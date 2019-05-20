@extends('layout.app')

@section('titulo', 'Lista de usuarios')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Usuarios</h5>
        <div class="card-body">
                <div class="form-group row mt-3">
                        <div class="col-sm-12">
                            <a name="" id="" class="btn btn-primary float-right" href="#" role="button">Nuevo usuario</a>
                        </div>
                    </div>
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
                            <a class="btn btn-sm btn-outline-primary" title="Ver información" href="/usuarios/ver-usuario/{{$usuario->id}}">
                                    ver
                                </a>
                                <a class="btn btn-sm btn-outline-primary" title="Ver información" href="#" onclick="event.preventDefault();
                                document.getElementById('admin-form{{$usuario->id}}').submit();">
                                             @if($usuario->administrator) no adm @else adm @endif
                                          </a>
                        <a class="btn btn-sm btn-outline-primary" title="Ver información" href="#" onclick="event.preventDefault();
              document.getElementById('user-form{{$usuario->id}}').submit();">
                           @if($usuario->disabled) hab @else deshab @endif
                        </a>
                        <form id="user-form{{$usuario->id}}" action="/usuarios/{{$usuario->id}}/usuario" method="POST">
                            @csrf
                            <input type="hidden" value="@if($usuario->disabled) false @else true @endif" name="deshabilitado">
                       </form>
                       <form id="admin-form{{$usuario->id}}" action="/usuarios/{{$usuario->id}}/admin" method="POST">
                        @csrf
                        <input type="hidden" value="@if($usuario->administrator) false @else true @endif" name="administrador">
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
