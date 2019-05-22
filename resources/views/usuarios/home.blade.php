@extends('layout.app')

@section('titulo', 'Lista de usuarios')

@section('contenido')
<div class="card">
    <h5 class="card-header">Usuarios</h5>
    <div class="card-body">
        <div class="form-group row mt-3">
            <div class="col-sm-12">
                <a name="" id="" class="btn btn-primary float-right" href="/usuarios/agregar-usuario"
                    role="button">Nuevo usuario</a>
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
                            <a class="btn btn-sm btn-outline-primary" title="Ver información"
                                href="/usuarios/ver-usuario/{{$usuario->id}}">
                                <i class="far fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-primary" title="Asignar dispositivo"
                                href="/usuarios/{{$usuario->id}}/asignar">
                                <i class="fas fa-location-arrow"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-{{($usuario->administrator?'primary':'success')}}"
                                title="{{ ($usuario->administrator)?'Quitar permisos administracion':'Dar permisos administracion' }}"
                                href="#" onclick="event.preventDefault();
                                document.getElementById('admin-form{{$usuario->id}}').submit();">
                                @if($usuario->administrator) <i class="fas fa-user"></i> @else <i
                                    class="fas fa-user-shield"></i> @endif
                            </a>
                            <a class="btn btn-sm btn-outline-{{($usuario->disabled?'primary':'danger')}}"
                                title="{{($usuario->disabled?'Habilitar usuario':'Deshabilitar usuario')}}" href="#"
                                onclick="event.preventDefault();$('#user-form{{$usuario->id}}').submit();">
                                @if($usuario->disabled) <i class="fas fa-unlock"></i> @else <i class="fas fa-lock"></i>
                                @endif
                            </a>
                            <form id="user-form{{$usuario->id}}" action="/usuarios/{{$usuario->id}}/usuario"
                                method="POST">
                                @csrf
                                <input type="hidden" value="@if($usuario->disabled) false @else true @endif"
                                    name="deshabilitado">
                            </form>
                            <form id="admin-form{{$usuario->id}}" action="/usuarios/{{$usuario->id}}/admin"
                                method="POST">
                                @csrf
                                <input type="hidden" value="@if($usuario->administrator) false @else true @endif"
                                    name="administrador">
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