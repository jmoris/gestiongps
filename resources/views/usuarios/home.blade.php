@extends('layout.app')

@section('titulo', 'Lista de usuarios')

@section('contenido')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUsr" style="margin: 0px 10px 10px 0px">Agregar usuario</button>
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
                        <a class="btn btn-sm btn-outline-danger" title="Ver información" href="#">borrar</a>
                        <a class="btn btn-sm btn-outline-secondary" title="Ver información" href="#">modificar</a>
                    </td>
                </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Formulario para agregar user --}}
    <div class="modal fade" id="addUsr" tabindex="-1" role="dialog" aria-labelledby="addUsr" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Crear Usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action=/usuarios method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre usuario">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail">Email</label>
                                <input type="email" autocomplete="off" class="form-control" name="email" id="inputEmail" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword">Constraseña</label>
                                <input type="password" autocomplete="off" class="form-control" name="pass" id="inputPassword" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <p>Fecha de expiración: <input type="text" name="fechaexp" id = "datepicker" showAnim="bounce" dateFormat="D, d MM yy"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permLect" id="permLect">
                            <label class="form-check-label" for="permLect">
                                Permisos de lectura
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="editDisp" id="editDisp">
                            <label class="form-check-label" for="editdisp">
                                Permisos para editar datos de dispositivos
                            </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Crear</button>
                </div>
              </div>
            </div>
          </div>

@stop
