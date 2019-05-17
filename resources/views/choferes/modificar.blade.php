@extends('layout.app')

@section('titulo', 'Modificar chofer')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Editar datos usuario</h5>
        <div class="card-body">
                <div class="espacio-20"></div>
                <div class="col-md-8 offset-md-2">
                        <form action="/usuarios/modificar/{{$usuario->id}}" method="POST">
                            @csrf 
                            <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" value="{{$usuario->name}}" class="form-control" name="nombre" id="nombre" placeholder="Nombre usuario">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail">Email</label>
                                <input type="email"  value="{{$usuario->email}}" class="form-control" name="email" id="inputEmail" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Constraseña</label>
                                <input type="password" value="{{$usuario->password}}" autocomplete="off" class="form-control" name="pass" id="inputPassword" placeholder="Contraseña">
                                </div>
                            </div>

                        </form>
                </div>
        </div>
@endsection