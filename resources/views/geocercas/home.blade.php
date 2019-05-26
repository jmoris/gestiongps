@extends('layout.app')

@section('titulo', 'Lista de geocercas')

@section('contenido')
<div class="card">
    <h5 class="card-header">Geocercas</h5>
    <div class="card-body">
        <div class="form-group row mt-3">
            <div class="col-sm-12">
                <a name="" id="" class="btn btn-primary float-right" href="/geocercas/agregar-geocerca"
                    role="button">Nueva geocerca</a>
            </div>
        </div>
        <div class="table-responsive col-sm-30">
            <table id="tablaDatos" class="table table-sm table-hover">
                <thead class="text-left">
                    <tr>
                        <th>Nombre</th>
                        <th>ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($geocercas as $geocerca)
                    <tr>
                        <td>{{ $geocerca->name}}</td>
                        <td>{{ $geocerca->id}}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary" title="Ver información"
                                href="/geocercas/ver-geocerca/{{$geocerca->id}}">
                                <i class="far fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-warning" title="Modificar información"
                                href="/geocercas/editar/{{$geocerca->id}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-primary" title="Asignar dispositivo"
                                href="/geocercas/{{$geocerca->id}}/asignar">
                                <i class="fas fa-location-arrow"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-primary" title="Asignar usuario"
                                href="/geocercas/{{$geocerca->id}}/asignar">
                                <i class="fas fa-user"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-danger" title="Borrar geocerca" href="#">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop