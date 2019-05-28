<!-- Se extiende el layout-->
@extends('layout.app')
<!-- Se asigna el titulo de la seccion-->
@section('titulo','Modificar chofer')
<!-- Se asigna el contenido de la seccion-->
@section('contenido')
<!-- Se agrega un division card-->
<div class="card">
    <!-- Se asigna la cabezera del card-->
    <h5 class="card-header">Modificar chofer</h5>
    <!-- Se agrega el cuerpo del card -->
    <div class="card-body">
        <div class="espacio-20"></div>
        <div class="col-md-8 offset-md-2">
            <!-- Se agrega el formulario para modificar -->
            <form action="/choferes/modificar/{{$chofer->id}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$chofer->name}}" class="form-control" name="nombre"
                            placeholder="Ej: Juan Perez">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rut" class="col-sm-4 col-form-label">RUT</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$chofer->uniqueId}}" class="form-control" name="rut"
                            placeholder="Ej: 11222333-4" required="required" pattern="\d{3,8}-[\d|kK]{1}"
                            title="Debe ser un Rut válido">
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Division con botones cancelar y guardar -->
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="button" class="btn btn-danger" onclick="location.href='/choferes'">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </div>
</div>
</form>

@endsection