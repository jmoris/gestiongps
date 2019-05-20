@extends('layout.app')

@section('titulo', 'Asignar dispositivo a chofer')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Asignar dispositivo a chofer</h5>
        <div class="card-body">
            <div class="espacio-20"></div>
            <div class="col-md-8 offset-md-2">
				<form action="/choferes/asignarDispositivo/{{$chofer->id}}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="chofer" value="{{$chofer->id}}">Nombre Chofer:{{$chofer->name}} </label>
                    </div>
                    <div>
                        <select name="dispositivo" >
                            @foreach ($dispositivos as $dispositivo)                        
                                <option value="{{$dispositivo->id}}">{{$dispositivo->name}}({{$dispositivo->uniqueId}})</option>                                            
                             @endforeach
                        </select>
                    </div>
                    <div class="row mt-3 "> 
                        <div class="col-sm-12"> 
                            <button type="submit" class="btn btn-danger" onclick="location.href='/choferes'">Cancelar</button> 
                            <button type="submit" class="btn btn-primary float-right" >Guardar</button> 
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection