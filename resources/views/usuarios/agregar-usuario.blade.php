@extends('layout.app')

@section('titulo', 'Ingresar dispositivo')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Agregar Ususario</h5>
        <div class="card-body">
                <div class="espacio-20"></div>
                <div class="col-md-8 offset-md-2">



                        <form action=/usuarios method="POST">
                            @csrf 
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
                            <div class="row mt-3 float-right"> 
                                    <div class="col-sm-12"> 
                                        <button type="submit" class="btn btn-primary" >Guardar</button> 
                                    </div> 
                                </div>
                        </form>


<!--
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
    <div class="row mt-3 float-right"> 
        <div class="col-sm-12"> 
            <button type="submit" class="btn btn-primary" >Guardar</button> 
        </div> 
    </div>
</form>

-->
@endsection