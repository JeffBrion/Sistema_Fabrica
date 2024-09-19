<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('js/oncclick.js') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src='{{ Asset('img/Puro_Logo.png') }}'width="50">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand" href="#">
                    <img src='{{ Asset('img/Puro_Logo.png') }}'width="50">
                </a>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item mt-3">
                  <a class="nav-link active color-nav-item" aria-current="page" href="{{ url('home') }}"><i class="fa-solid fa-home me-4 color-nav-item"></i> Inicio</a>
                </li>
                <li class="nav-item mt-3">
                  <a class="nav-link active color-nav-item" aria-current="page" href="{{ url('user') }}"><i class="fa-solid fa-users me-4 color-nav-item"></i> Usuarios</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link active color-nav-item" aria-current="page" href="{{ url('worked') }}"><i class="fa-solid fa-person-running me-4 color-nav-item"></i> Trabajador</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link active color-nav-item" aria-current="page" href="{{ url('area') }}"><i class="fa-solid fa-layer-group me-4 color-nav-item"></i> Areas</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link active color-nav-item" aria-current="page" href="#"><i class="fa-solid fa-joint me-4 color-nav-item"></i> Producto</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link active color-nav-item" aria-current="page" href="#"><i class="fa-solid fa-user-check me-4 color-nav-item"></i> Producción</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="wrapper_nav" style="height: 80px"></div>
      <div class="container">
          @yield('body')
      </div>
</body>
</html>