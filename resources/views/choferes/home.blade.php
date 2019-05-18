@extends('layout.app')

@section('titulo','Choferes')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Lista de Choferes</h5>
        <div class="card-body">
            <div class="table-responsive">
                    <div class="form-group row mt-3">
                        <div class="col-sm-12">
                            <a name="" id="" class="btn btn-primary float-right" href="/choferes/agregar" role="button">Nuevo</a>
                        </div>
                    </div>
                    <table id="tablaDatos" class="table table-sm table-hover">
                        <thead class="text-left">
                            <tr>
                                <th>Nombre</th>
                                <th>RUT</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_array($chof))
                                @foreach ($chof as $c)
                                    <tr>
                                        <td>{{ $c->name }}</td>
                                        <td>{{ $c->uniqueId}}</td>
                                        <td>
                                        <a class="btn btn-sm btn-outline-warning" title="Modificar información" href="choferes/modificar/{{$c->id}}">
                                                modificar
                                             </a>
                                            <a class="btn btn-sm btn-outline-danger" title="Borrar información" href="choferes/eliminar/{{$c->id}}">
                                                borrar
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