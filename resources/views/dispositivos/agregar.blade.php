<!-- Se extiende el layout -->
@extends('layout.app')
<!-- Se asigna el titulo de la seccion -->
@section('titulo', 'Ingresar dispositivo')
<!-- Se agrega el contenido de la seccion -->
@section('contenido')
<!-- Se agrega una division card -->
<div class="card">
    <!-- Se asigna la cabezera del card -->
    <h5 class="card-header">Ingresar dispositivo</h5>
    <!-- Se agrega el cuerpo del card -->
    <div class="card-body">
        <div class="espacio-20"></div>
        <div class="col-md-8 offset-md-2">
            <!-- Se agrega el formulario para agregar dispositvos -->
            <form method="POST" action="/dispositivos">
                @csrf
                <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nombre" placeholder="Ej: ABCD-11">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="imei" class="col-sm-4 col-form-label">IMEI</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="imei" placeholder="Ej: 867060037111000"
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="estado" class="col-sm-4 col-form-label">Estado</label>
                    <div class="col-sm-8">
                        <select name="categoria">
                            <option value="offline">Desconectado</option>
                            <option value="online" selected>Conectado</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefono" class="col-sm-4 col-form-label">Teléfono</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="telefono" pattern="[0-9]"
                            placeholder="Ej: 9 12345678">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="modelo" class="col-sm-4 col-form-label">Modelo</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="modelo" placeholder="Ej: Teltonika FM3612">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="contacto" class="col-sm-4 col-form-label">Contacto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="contacto" placeholder="Ej: Juan Perez">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="categoria" class="col-sm-4 col-form-label">Categoria</label>
                    <div class="col-sm-8">
                        <select name="categoria">
                            <option value="arrow" selected>Flecha</option>
                            <option value="bicycle">Bicicleta</option>
                            <option value="boat">Bote</option>
                            <option value="bus">Autobus</option>
                            <option value="car">Automovil</option>
                            <option value="crane">Grua</option>
                            <option value="helicopter">Helicoptero</option>
                            <option value="motorcycle">Motocicleta</option>
                            <option value="offroad">Todoterreno</option>
                            <option value="person">Persona</option>
                            <option value="pickup">Pickup</option>
                            <option value="plane">Avion</option>
                            <option value="ship">Barco</option>
                            <option value="tractor">Tractor</option>
                            <option value="truck">Camion</option>
                        </select>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Division con botones cancelar y guardar -->
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="button" class="btn btn-danger" onclick="location.href='/dispositivos'">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </div>
</div>
</form>
@endsection