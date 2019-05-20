@extends('layout.app')

@section('titulo', 'Lista de usuarios')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Lista de Usuarios</h5>
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
                        @if(($usuario->administrator) == 'SI')
                        <form action="/usuarios/{{$usuario->id}}/admin" method="POST">
                        @csrf
                        <a class="btn btn-sm btn-outline-primary" title="Ver información" href="#">
                            ver
                        </a>
                            <input type="hidden" value="false" name="administrador">
                            <input type="submit" value="no adm" name="editar_privilegio"/>
                        
                        </form>
                        @else
                        <form action="/usuarios/{{$usuario->id}}/admin" method="POST">
                        @csrf
                        <a class="btn btn-sm btn-outline-primary" title="Ver información" href="#">
                            ver
                        </a>
                        <input type="hidden" value="true" name="administrador">
                        <input type="submit" value="adm" name="editar_privilegio"/>
                    
                        </form>
                        @endif
                        
                    </td>
                </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
