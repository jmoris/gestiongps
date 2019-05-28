@extends('layout.app')

@section('titulo', 'Modificar dispositivo')

@section('contenido')
<div class="card">
    <h5 class="card-header">Modificar dispositivo</h5>
    <div class="card-body">
        <div class="espacio-20"></div>
        <div class="col-md-8 offset-md-2">
            <form method="POST" action="/dispositivos/{{$dispositivo->uniqueId}}">
                @csrf
                <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nombre" value="{{$dispositivo->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="imei" class="col-sm-4 col-form-label">IMEI</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="imei" placeholder="Ej:"
                            value="{{$dispositivo->uniqueId}}"
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="estado" class="col-sm-4 col-form-label">Estado</label>
                    <div class="col-sm-8">
                        <select name="categoria">
                            <option value="offline">Offline</option>
                            <option value="online" selected>Online</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefono" class="col-sm-4 col-form-label">Teléfono</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="telefono" placeholder="Ej:"
                            value="{{$dispositivo->phone}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="modelo" class="col-sm-4 col-form-label">Modelo</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="modelo" placeholder="Ej:"
                            value="{{$dispositivo->model}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="contacto" class="col-sm-4 col-form-label">Contacto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="contacto" placeholder="Ej:"
                            value="{{$dispositivo->contact}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="categoria" class="col-sm-4 col-form-label">Categoria</label>
                    <div class="col-sm-8">
                        <select name="categoria">
                            <option value="arrow" @if($dispositivo->category=='arrow') selected @endif>Flecha</option>
                            <option value="bicycle" @if($dispositivo->category=='bicycle') selected @endif>Bicicleta</option>
                            <option value="boat" @if($dispositivo->category=='boat') selected @endif>Bote</option>
                            <option value="bus" @if($dispositivo->category=='bus') selected @endif>Autobus</option>
                            <option value="car" @if($dispositivo->category=='car') selected @endif>Automovil</option>
                            <option value="crane" @if($dispositivo->category=='crane') selected @endif>Grua</option>
                            <option value="helicopter" @if($dispositivo->category=='helicopter') selected @endif>Helicoptero/option>
                            <option value="motorcycle" @if($dispositivo->category=='motorcycle') selected @endif>Motocicleta</option>
                            <option value="offroad" @if($dispositivo->category=='offroad') selected @endif>Todoterreno</option>
                            <option value="person" @if($dispositivo->category=='person') selected @endif>Persona</option>
                            <option value="pickup" @if($dispositivo->category=='pickup') selected @endif>Pickup</option>
                            <option value="plane" @if($dispositivo->category=='plane') selected @endif>Avion</option>
                            <option value="ship" @if($dispositivo->category=='ship') selected @endif>Barco</option>
                            <option value="tractor" @if($dispositivo->category=='tractor') selected @endif>Tractor</option>
                            <option value="truck" @if($dispositivo->category=='truck') selected @endif>Camion</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="geocercas" class="col-sm-4 col-form-label">Geocercas</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="geocercas" placeholder="Ej:">
                    </div>
                </div>

        </div>
    </div>
</div>
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="button" class="btn btn-danger" onclick="location.href='/dispositivos'">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </div>
</div>
</form>
@endsection