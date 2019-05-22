@extends('layout.app')

@section('titulo', 'Detalles usuario')

@section('contenido')
<div class="card">
    <h5 class="card-header">Detalles usuario</h5>
    <div class="card-body">
        <div class="espacio-20"></div>
        <div class="col-md-8 offset-md-2">

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" value="{{$usuario->name}}" class="form-control" name="nombre" id="nombre"
                    placeholder="Nombre usuario" readonly>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" value="{{$usuario->email}}" class="form-control" name="email" id="inputEmail"
                        placeholder="Email" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword">Constraseña</label>
                    <input type="password" value="{{$usuario->password}}" autocomplete="off" class="form-control"
                        name="pass" id="inputPassword" placeholder="Contraseña" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <p>Fecha de expiración: <input type="text" value="{{$usuario->expirationTime}}" name="fechaexp"
                            readonly></p>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" @if($usuario->readonly)checked @endif
                    name="permLect" id="permLect" disabled>
                    <label class="form-check-label" for="permLect">
                        Permisos de lectura
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" @if($usuario->deviceReadonly)checked @endif
                    name="editDisp" id="editDisp" disabled>
                    <label class="form-check-label" for="editdisp">
                        Permisos para editar datos de dispositivos
                    </label>
                </div>
            </div>
            <div class="row mt-3 float-right">
                <div class="col-sm-12">
                    <a href="/usuarios" class="btn btn-primary">Salir</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <h5 class="card-header">Dispositivos Asociados a {{$usuario->name}}</h5>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-sm table-hover">
                <thead class="text-left">
                    <tr>
                        <th>Nombre</th>
                        <th>IMEI</th>
                        <th>Estado</th>
                    </tr>
                    @foreach($dispositivos as $dis)
                    <tr>
                        <td>{{ $dis->name }}</td>
                        <td>{{ $dis->uniqueId}}</td>
                        <td>{{ $dis->status}}</td>
                    </tr>
                    @endforeach

                </thead>
            </table>
        </div>
    </div>

</div>





@endsection