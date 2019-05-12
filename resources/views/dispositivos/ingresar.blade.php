@extends('layout.app')

@section('titulo', 'Ingresar dispositivo')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Ingresar dispositivo</h5>
        <div class="card-body">
                <div class="espacio-20"></div>
                <div class="col-md-8 offset-md-2">
                <form method="POST">            
                    <div class="form-group row">
                        <label for="nombre-dispositivo" class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre-dispositivo" placeholder="Huawei Jesus">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="imei" class="col-sm-4 col-form-label">IMEI</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre-dispositivo" placeholder="Huawei Jesus">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="estado" class="col-sm-4 col-form-label">Estado</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="imei" placeholder="Huawei Jesus">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefono" class="col-sm-4 col-form-label">Teléfono</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="telefono" placeholder="Huawei Jesus">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="modelo" class="col-sm-4 col-form-label">Modelo</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="modelo" placeholder="Huawei Jesus">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="contacto" class="col-sm-4 col-form-label">Contacto</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="contacto" placeholder="Huawei Jesus">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="categoria" class="col-sm-4 col-form-label">Categoria</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="categoria" placeholder="Huawei Jesus">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="geocercas" class="col-sm-4 col-form-label">Geocercas</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="geocercas" placeholder="Huawei Jesus">
                        </div>
                    </div>

                    
                  
                </form>
                </div>
        </div>
    </div>
    <div class="row mt-3 float-right"> 
        <div class="col-sm-12"> 
            <button type="submit" class="btn btn-primary" >Guardar</button> 
        </div> 
    </div>
@endsection