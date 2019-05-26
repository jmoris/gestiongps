@extends('layout.app')

@section('titulo', 'Nueva geocerca')

@section('contenido')
<div class="card">
    <h5 class="card-header">Geocerca</h5>
    <div class="espacio-20"></div>
    <div class="card-body">
        <div class="col-md-8 offset-md-2">
            <form autocomplete="off" action="/geocercas/agregar-geocerca" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="latitud" class="col-sm-4 col-form-label">Nombre:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nombre" placeholder="Ej: Mi Geocerca"
                            > 
                    </div>
                </div>

                <div class="form-group row">
                    <label for="longitud" class="col-sm-4 col-form-label">Descripción: </label>
                    <div class="col-sm-8">
                        <textarea name="comentarios" rows="5" cols="47" placeholder="Escriba aquí la descripcion de al geocerca."></textarea>
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