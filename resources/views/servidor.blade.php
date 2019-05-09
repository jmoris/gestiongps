@extends('layout.app')

@section('titulo', 'Pagina principal')

@section('contenido')
<div class="card-body">
    <h5 class="card-header">Ajustes del servidor:</h3>
    <div class="col-md-8 offset-md-2">
    <form>
        <div class="form-group row">
            <div class="col-sm-4">Servidor en modo lectura</div>
            <div class="col-sm-8">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                        Si
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">Dispositivos en modo lectura</div>
            <div class="col-sm-8">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                        Si
                    </label>
                </div>
            </div>
        </div>




        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn bg-azul text-white" >Guardar</button>
            </div>
        </div>



    </form>
    </div>
</div>


@stop