@extends('layout.app')

@section('titulo', 'Ingresar usuario')

@section('contenido')
<div class="card">
    <h5 class="card-header">Agregar nuevo usuario</h5>
    <div class="card-body">
        <div class="espacio-20"></div>
        <div class="col-md-8 offset-md-2">
            <form autocomplete="off" action="/usuarios/agregar-usuario" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ej: Juan Perez">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" name="email" autocomplete="false" id="inputEmail"
                            placeholder="Ej: juanperez@dominio.cl">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Constraseña</label>
                        <input type="password" class="form-control" name="pass" id="inputPassword"
                            placeholder="Contraseña">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <p>Fecha de expiración: <input type="text" name="fechaexp" id="datepicker"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permLect" id="permLect" checked>
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
        </div>
    </div>
</div>
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="button" class="btn btn-danger" onclick="location.href='/usuarios'">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </div>
</div>
</form>

</div>

<script>
    $( function() {
                $( "#datepicker" ).datepicker();
                $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
                $( "#datepicker" ).datepicker( "option", "showAnim", "fadeIn" );
                $("#datepicker").datepicker("setDate", "{{date('Y-m-d', strtotime('+1 month'))}}");
                }); 
</script>
@endsection