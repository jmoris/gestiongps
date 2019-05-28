@extends('layout.app')

@section('titulo', 'Asignar geocerca a usuario')

@section('contenido')
<div class="card">
    <h5 class="card-header">Asignar geocerca a usuario</h5>
    <div class="card-body">
        <div class="espacio-20"></div>
        <div class="col-md-8 offset-md-2">
            <form action="/geocercas/asignar/{{$geocerca->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="geocerca" value="{{$geocerca->id}}">
                    <label for="geocerca">Nombre geocerca: {{$geocerca->name}} </label>
                </div>
                <div>
                    <select name="usuario" class="form-control">
                        @foreach ($usuarios as $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                        @endforeach
                    </select>
                </div>

        </div>
    </div>
</div>
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="button" class="btn btn-danger" onclick="location.href='/geocercas'">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </div>
</div>
</form>
@endsection