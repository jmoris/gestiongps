<!-- Se extiende el layout-->
@extends('layout.app')
<!-- Se asigna el titulo a la seccion-->
@section('titulo', 'Asignar grupo a chofer')
<!-- Se agrega el contenido de la seccion-->
@section('contenido')
<!-- Se agrega una division d tipo card-->
<div class="card">
    <!-- Se asigna la cabezera del card-->
    <h5 class="card-header">Asignar grupo a chofer</h5>
    <!-- Se asigna el cuerpo del card-->
    <div class="card-body">
        <div class="espacio-20"></div>
        <div class="col-md-8 offset-md-2">
            <!-- Se agrega el formulario para asignar-->
            <form action="/choferes/asignarGrupo/{{$chofer->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="chofer" value="{{$chofer->id}}">Nombre: {{$chofer->name}} </label>
                </div>
                <div lass="form-group">
                    <label for="chofer" value="{{$chofer->id}}">Nombre del grupo: </label>
                    <select name="grupo" id="grupo" class="form-control">
                        @foreach ($grupos as $grupo)
                        <option value="{{$grupo->id}}">{{$grupo->name}}</option>
                        @endforeach
                    </select>
                </div>
                <a href="#" onclick="eliminarGrupo()" class="text-danger float-left">Borrar grupo</a>
                <a href="#" onclick="agregarGrupo()" class="float-right">Agregar grupo</a>
        </div>
    </div>
</div>
<!-- Se agrega division con botones-->
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-danger" onclick="location.href='/choferes'">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </div>
</div>
<!-- Formulario para nuevo grupo-->
</form>
<form id="nuevoGrupo" action="/choferes/grupo" method="post">
    @csrf
    <input type="hidden" id="nombregrupo" name="nombre" value="">
</form>
<!-- Formulario para eliminar grupo-->
<form id="eliminarGrupo" action="" method="post">
    @csrf
</form>
<script>
    function agregarGrupo(){
        var str = prompt('Nombre del grupo');
        if(str != ''){
            document.getElementById('nombregrupo').value = str;
            document.getElementById('nuevoGrupo').submit();
        }
    }

    function eliminarGrupo(){
        var confirmacion = confirm('¿Desea eliminar este grupo?');
        if(confirmacion){
            var seleccion = document.getElementById('grupo');
            document.getElementById('eliminarGrupo').action = '/choferes/grupo/' + seleccion.options.item(seleccion.selectedIndex).value;
            document.getElementById('eliminarGrupo').submit();
        }
    }
</script>
@endsection