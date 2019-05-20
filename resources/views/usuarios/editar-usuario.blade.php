@extends('layout.app')

@section('titulo', 'Editar usuario')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Editar datos usuario</h5>
        <div class="card-body">
                <div class="espacio-20"></div>
                <div class="col-md-8 offset-md-2">
                        <form action="/usuarios/editar-usuario/{{$usuario->id}}" method="POST">
                            @csrf 
                            <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" value="{{$usuario->name}}" class="form-control" name="nombre" id="nombre" placeholder="Nombre usuario">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail">Email</label>
                                <input type="email"  value="{{$usuario->email}}" class="form-control" name="email" id="inputEmail" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Constraseña</label>
                                <input type="password" value="{{$usuario->password}}" autocomplete="off" class="form-control" name="pass" id="inputPassword" placeholder="Contraseña">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                <p>Fecha de expiración: <input type="text" value="{{$usuario->expirationTime}}" name="fechaexp" id="datepicker"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" @if($usuario->readonly)checked @endif name="permLect" id="permLect">
                                    <label class="form-check-label" for="permLect">
                                        Permisos de lectura
                                    </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" @if($usuario->deviceReadonly)checked @endif  name="editDisp" id="editDisp">
                                <label class="form-check-label" for="editdisp">
                                    Permisos para editar datos de dispositivos
                                </label>
                                </div>
                            </div>
                            <div class="row mt-3 float-right"> 
                                <div class="col-sm-12"> 
                                    <button type="submit" class="btn btn-primary" >Guardar</button> 
                                </div> 
                            </div>
                        </form>
                </div>
        </div>
        <script>
            $( function() {
                $( "#datepicker" ).datepicker();
                $( "#datepicker" ).datepicker( "option", "showAnim", "fadeIn" );
                $( "#datepicker" ).datepicker( "option", "defaultDate", {{$usuario->expirationTime}} );
                $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
                }); 
        </script>
   
@endsection