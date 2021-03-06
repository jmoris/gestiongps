<!-- Se extiende el layout -->
@extends('layout.app')
<!-- Se asigna el titulo de la seccion -->
@section('titulo', 'Ver Dispositivo')
<!-- Se agrega el contenido de la seccion -->
@section('contenido')
<!-- Se agrega una division card -->
<div class="card">
    <!-- Se asigna la cabezera del card -->
    <h5 class="card-header">Dispositivo</h5>
    <!-- Se agrega el cuerpo del card -->
    <div class="card-body">
        <div class="espacio-20"></div>
        <div class="col-md-8 offset-md-2">
            <form method="POST" action="/dispositivos/{{$dispositivo->uniqueId}}">
                @csrf
                <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nombre" value="{{$dispositivo->name}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="imei" class="col-sm-4 col-form-label">IMEI</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="imei" value="{{$dispositivo->uniqueId}}" readonly
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="estado" class="col-sm-4 col-form-label">Estado</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="status" value="{{$dispositivo->status}}" readonly>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefono" class="col-sm-4 col-form-label">Teléfono</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="telefono" value="{{$dispositivo->phone}}"
                            readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="modelo" class="col-sm-4 col-form-label">Modelo</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="modelo" value="{{$dispositivo->model}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="contacto" class="col-sm-4 col-form-label">Contacto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="contacto" value="{{$dispositivo->contact}}"
                            readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="categoria" class="col-sm-4 col-form-label">Categoria</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="categoria" value="{{$dispositivo->category}}"
                            readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="geocercas" class="col-sm-4 col-form-label">Geocercas</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="geocercas" readonly>
                    </div>
                </div>

        </div>
    </div>
</div>
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-danger" onclick="location.href='/dispositivos'">Atras</button>
    </div>
</div>
</form>
@endsection