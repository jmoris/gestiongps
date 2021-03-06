@extends('layout.app')

@section('titulo', 'Pagina reportes')

@section('contenido')
<div class="card">
  <h5 class="card-header">Reportes</h5>
  <div class="card-body">
    <div class="text-center">
      <div class="tarjeta" onclick="location.href='/reportes/dispositivos'">
        <div class="icono">
          <img src="/icon/reportes.png">
        </div>
        <h6 class="texto">Reporte de Dispositivos</h6>
      </div>

      <div class="tarjeta" onclick="location.href='/reportes/usuarios'">
        <div class="icono">
          <img src="/icon/reportes.png">
        </div>
        <h6 class="texto">Reporte de Usuarios</h6>
      </div>

    </div>
  </div>
</div>
@stop