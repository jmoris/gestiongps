<!-- Se extiende el layout -->
@extends('layout.app')
<!-- Se agrega el titulo de la seccion -->
@section('titulo', 'Nuevo Chofer')
<!-- Se agrega la seccion del contenido de la vista-->
@section('contenido')
<!-- Se agrega una division card-->
<div class="card">
    <!-- Se agrega la cabezera del card-->
    <h5 class="card-header">Nuevo chofer</h5>
    <!-- Se asigna el cuerpo del card-->
    <div class="card-body">
        <!-- Se agrega un espacio-->
        <div class="espacio-20"></div>
        <!-- Division de columna-->
        <div class="col-md-8 offset-md-2">
            <form method="POST" action="/choferes">
                @csrf
                <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nombre" placeholder="Ej: Juan Perez">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rut" class="col-sm-4 col-form-label">RUT</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="rut" placeholder="Ej: 11222333-4"
                            required="required" pattern="\d{3,8}-[\d|kK]{1}" title="Debe ser un Rut válido">
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Division con botones guardar y cancelar-->
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="button" class="btn btn-danger" onclick="location.href='/choferes'">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </div>
</div>
</form>

@endsection