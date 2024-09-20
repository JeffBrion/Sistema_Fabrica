<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <title>Login</title>
</head>
<body>
    <div class="Contenedor">

        <div class="formualario">
            <h2>
                Fábrica de Puros Campeche
            </h2>
            <h3>
                Fábrica de Puros Campeche(FPC) - Estelí, Nicaragua.
            </h3>
          
            
            <form method="POST" action="{{ route('validation') }}">
                @csrf
                @if (session('error'))
                <div class="alert alert-warning" role="alert">
                    {{ session('error') }}
                 </div>
                 @endif
                <h4>Usuario</h4>
                <input type="text" name="user">
                <h4>Contraseña</h4>
                <input type="password" name="password">

                <input href="" type="submit" value="Ingresar" class="buttom"  >
            </form>
            <h3 style="top: 25%" >
                Todos los derechos reservados @FPC
            </h3>
        </div>

        <div class="imagen">
            <img src="{{ asset('img/Puro_Logo.png') }}" alt="">
        </div>
    </div>

</body>
</html>