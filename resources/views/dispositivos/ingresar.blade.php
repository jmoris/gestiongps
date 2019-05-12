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
                            <input type="text" class="form-control" id="latitud" placeholder="Ej: -33.4726900">
                        </div>
                    </div>
            
                  
                </form>
                </div>
        </div>
    </div>
@endsection