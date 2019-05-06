<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion GPS - Inicio de sesion</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/login.css">
    
    
</head>
<body>
    <div class="container">
        <div class="centrado text-center">
            <form class="form-login" action="/login" method="post">
                @csrf
                <img class="mb-3" id="logo" src="/logo.png" alt="">
                <label class="sr-only" for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" required >
                <label class="sr-only" for="password">Contraseña</label>
                <span class="glyphicon glyphicon-time"></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                <div class="form-check mt-3 mb-3">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    Recordar
                  </label>
                </div>
                @if(session('error_login'))
                    <div class='text-danger'>
                        {{session('error_login')}}
                    </div>
                @endif
                <button id="btn-ingresar" type="submit" class="btn btn-block btn-primary">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>