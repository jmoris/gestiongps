@extends('layout.app')

@section('titulo', 'Pagina principal')

@section('contenido')
<div class="card">
    <h5 class="card-header">Ajustes del servidor</h5>
    <div class="espacio-20"></div>
    <div class="card-body">
        <div class="col-md-8 offset-md-2">
            <form action="/servidor" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-4">Servidor en modo lectura</div>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="check_servidor"
                                @if($servidor->readonly)checked @endif>
                            <label class="form-check-label" for="gridCheck1">
                                Sí
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">Dispositivos en modo lectura</div>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="check_dispositivos"
                                @if($servidor->deviceReadonly)checked @endif>
                            <label class="form-check-label" for="gridCheck1">
                                Sí
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">Registro en pantalla principal</div>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="check_registro"
                                @if($servidor->registration)checked @endif>
                            <label class="form-check-label" for="gridCheck1">
                                Sí
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="latitud" class="col-sm-4 col-form-label">Latitud en el mapa</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="latitud" placeholder="Ej: -33.4726900"
                            value="{{$servidor->latitude}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="longitud" class="col-sm-4 col-form-label">Longitud en el mapa</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="longitud" placeholder="Ej: -70.6472400"
                            value="{{$servidor->longitude}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="zoom" class="col-sm-4 col-form-label">Zoom en el mapa</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="zoom" placeholder="Ej: 100"
                            value="{{$servidor->zoom}}">
                        @if(session('error_servidor'))
                        <div class='text-danger col-sm-8'>
                            {{session('error_servidor')}}
                        </div>
                        @endif
                    </div>
                </div>
        </div>
    </div>
    <div class="espacio-20"></div>
</div>
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="button" class="btn btn-danger" onclick="location.href='/home'">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </div>
</div>
</form>
</div>
@stop