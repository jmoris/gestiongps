<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Sistema gestion GPS | @yield("titulo")</title>
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel=“stylesheet” href=“/css/estilos.css”>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-azul navbar-dark">
      <a class="navbar-brand" href="#">
        <img src="/logo.png" alt="logo" style="width:200px;">
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Ajustes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Dispositivos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Choferes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reportes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Geocerca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Servidor</a>
        </li>
      </ul>
    </nav>

    <main role="main" class="container">@yield("contenido")</main>
  </body>
</html>
