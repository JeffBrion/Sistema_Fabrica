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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('home') }}">
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
                  <a class="nav-link active color-nav-item" aria-current="page" href="{{ url('area') }}"><i class="fa-solid fa-layer-group me-4 color-nav-item"></i> Areas</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link active color-nav-item" aria-current="page" href="{{ url('worked') }}"><i class="fa-solid fa-person-running me-4 color-nav-item"></i> Trabajador</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link active color-nav-item" aria-current="page" href="{{url('product')}}"><i class="fa-solid fa-joint me-4 color-nav-item"></i> Producto</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link active color-nav-item" aria-current="page" href="{{ url('production') }}"><i class="fa-solid fa-user-check me-4 color-nav-item"></i> Producción</a>
                </li>
                <li class="nav-item mt-3">
                  <a class="nav-link active color-nav-item" aria-current="page" href="{{ url('planilla') }}"><i class="fa-solid fa-book me-4 color-nav-item"></i> Planillas</a>
              </li>
                <li class="nav-item mt-3">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"  class="nav-link active color-nav-item" aria-current="page"><i class="fa-solid fa-arrow-right-from-bracket me-4 color-nav-item"  ></i> Cerrar  Sesión</button>
                </form>
                 
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