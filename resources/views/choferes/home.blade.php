<!-- Se extiende el layout-->
@extends('layout.app')
<!-- Se asigna el titulo de la seccion-->
@section('titulo','Choferes')
<!-- Se asigna el contenido de la seccion-->
@section('contenido')
<!-- Se agrega un division card-->
<div class="card">
    <!-- Se asigna la cabezera del card-->
    <h5 class="card-header">Lista de Choferes</h5>
    <!-- Se agrega el cuerpo del card-->
    <div class="card-body">
        <!-- Se agrega la tabla con los choferes-->
        <div class="table-responsive">
            <div class="form-group row mt-3">
                <div class="col-sm-12">
                    <a name="" id="" class="btn btn-primary float-right" href="/choferes/agregar" role="button">Nuevo
                        chofer</a>
                </div>
            </div>
            <table id="tablaDatos" class="table table-sm table-hover">
                <thead class="text-left">
                    <tr>
                        <th>Nombre</th>
                        <th>RUT</th>
                        <th width="15%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (is_array($chof))
                    @foreach ($chof as $c)
                    <tr>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->uniqueId}}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" title="Modificar información"
                                href="/choferes/modificar/{{$c->id}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-danger" title="Borrar información"
                                onclick="if(confirm('¿Desea eliminar el chofer?')){ location.href='/choferes/eliminar/{{$c->id}}'; }"
                                href="#">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-success" title="Asignar grupo"
                                href="choferes/asignarGrupo/{{$c->id}}">
                                <i class="fas fa-users"></i>
                            </a>
                        </td>
                    </tr>

                    @endforeach

                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection