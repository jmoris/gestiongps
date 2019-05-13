@extends('layout.app')

@section('titulo', 'Ingresar dispositivo')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Ingresar dispositivo</h5>
        <div class="card-body">
                <div class="espacio-20"></div>
                <div class="col-md-8 offset-md-2">
                <form method="POST" action="/dispositivos">     
                    @csrf       
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nombre" placeholder="Huawei Jesus">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="imei" class="col-sm-4 col-form-label">IMEI</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="imei" placeholder="Ej:" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
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
                            <input type="text" class="form-control" name="telefono" placeholder="Ej:">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="modelo" class="col-sm-4 col-form-label">Modelo</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="modelo" placeholder="Ej:">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="contacto" class="col-sm-4 col-form-label">Contacto</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="contacto" placeholder="Ej:">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="categoria" class="col-sm-4 col-form-label">Categoria</label>
                        <div class="col-sm-8">
                            <select name="categoria">
                                <option value="arrow">Flecha</option> 
                                <option value="bicycle" selected>Bicicleta</option>
                                <option value="boat">Bote</option>
                                <option value="bus">Autobus</option>
                                <option value="car">Automovil</option>
                                <option value="crane">Grua</option>
                                <option value="helicopter">Helicoptero/option>
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
                <button type="submit" class="btn btn-danger" onclick="location.href='/dispositivos'">Cancelar</button> 
            <button type="submit" class="btn btn-primary float-right" >Guardar</button> 
        </div> 
    </div>
</form>
@endsection