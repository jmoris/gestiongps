<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Sistema gestion GPS | @yield("titulo")</title>
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-azul fixed-top navbar-dark">
      <a class="navbar-brand" href="#">
        <img src="/logo.png" alt="logo" style="width:200px;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
              aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="/usuarios"><img width="24px" src="/icon/usuarios.png"/>Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dispositivos"><img width="24px" src="/icon/dispositivos.png"/>Dispositivos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/choferes"><img width="24px" src="/icon/choferes.png"/>Choferes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/reportes"><img width="24px" src="/icon/reportes.png"/>Reportes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/geocercas"><img width="24px" src="/icon/geocercas.png"/>Geocerca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/servidor"><img width="24px" src="/icon/servidor.png"/>Ajustes Servidor</a>
        </li>
      </ul>
      <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
              <a class="nav-link" href="/logout" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>
              Salir</a>
          </li>
          <form id="logout-form" action="/logout" method="POST" style="display: none;">
              @csrf
          </form>
      </ul>
          </div>
    </nav>
    <div class="espacio"></div>
    <main role="main" class="container">@yield("contenido")</main>
    <script>
      $(document).ready(function(){
        $('#tablaDatos').DataTable({
          language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
          }
        });
      });
    </script>
  </body>
</html>
