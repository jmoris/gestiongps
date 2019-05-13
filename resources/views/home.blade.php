@extends('layout.app')

@section('titulo', 'Pagina principal')

@section('contenido')
<div class="card">
    <h5 class="card-header">Inicio</h5>
    <div class="card-body">
      <div class="text-center">
      <div class="tarjeta" onclick="location.href='/usuarios'">
  <div class="icono">
    <img src="/icon/usuarios.png">
  </div>
    <h5 class="texto">Usuarios</h5>
</div>
<div class="tarjeta" onclick="location.href='/dispositivos'">
  <div class="icono">
    <img src="/icon/dispositivos.png">
  </div>
    <h5 class="texto">Dispositivos</h5>
</div>
<div class="tarjeta" onclick="location.href='/choferes'">
  <div class="icono">
    <img src="/icon/choferes.png">
  </div>
    <h5 class="texto">Choferes</h5>
</div>
<div class="tarjeta" onclick="location.href='/reportes'">
  <div class="icono">
    <img src="/icon/reportes.png">
  </div>
    <h5 class="texto">Reportes</h5>
</div>
<div class="tarjeta" onclick="location.href='/geocercas'">
  <div class="icono">
    <img src=/icon/geocercas.png>
  </div>
    <h5 class="texto">Geocercas</h5>
</div>
<div class="tarjeta" onclick="location.href='/servidor'">
  <div class="icono">
    <img src="/icon/servidor.png">
  </div>
    <h5 class="texto">Servidor</h5>
</div>
</div>
    </div>
</div>
@stop
