<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Admin') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS (para los iconos) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        /* Estilos para el sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: white;
            z-index: 1000; /* Asegura que esté sobre el contenido en móviles */
            transition: all 0.3s;
        }

        .sidebar .nav-link {
            color: white;
            font-weight: 500;
            padding: 15px 20px;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
            color: white;
        }

        .sidebar .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .sidebar .sidebar-header {
            padding: 15px;
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        .sidebar .sidebar-header h4 {
            margin-top: 10px;
            color: white; /* Color blanco para el nombre del usuario */
        }

        .sidebar .profile-pic {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #ffffff;
            margin: 0 auto;
        }

        .sidebar .profile-pic img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Ajuste del contenido principal */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Barra superior cuando es responsivo */
        .top-navbar {
            display: none;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            z-index: 1100; /* Asegura que esté sobre el sidebar en móviles */
            color: white;
            padding: 10px 15px;
        }

        .top-navbar .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .top-navbar .navbar-brand:hover {
            color: #ccc;
        }

        /* Responsivo para móviles */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }

            .sidebar.active {
                margin-left: 0;
            }

            .content {
                margin-left: 0;
                padding-top: 60px; /* Ajusta el espacio para la barra superior */
            }

            .top-navbar {
                display: block; /* Muestra la barra superior en pantallas pequeñas */
            }

            #sidebarCollapse {
                color: white;
                border: none;
                font-size: 24px;
            }

            .sidebar .sidebar-header {
                padding-top: 60px; /* Ajusta el espacio para que no se solape con la barra superior */
            }
        }

        /* Logout ubicado al final del menú */
        .nav-item-logout {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .nav-item-logout .nav-link {
            padding: 15px 20px;
            background-color: #495057;
        }

        .nav-item-logout .nav-link:hover {
            background-color: #343a40;
        }
    </style>
</head>
<body>

    <!-- Barra superior fija (solo visible en móviles) -->
    <nav class="top-navbar">
        <div class="d-flex justify-content-between">
            <a class="navbar-brand" href="#">Mi Aplicación</a>
            <button type="button" id="sidebarCollapse">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <!-- Espacio para la foto de perfil -->
                <div class="profile-pic">
                    <img src="https://image.freepik.com/vector-gratis/logotipo-mascota-toro_138200-66.jpg" alt="User Perfil ">
                </div>
                <h4>{{ Auth::user()->name }}</h4> <!-- Nombre del usuario -->
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{route('home')}}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="#">
                        <i class="fas fa-edit"></i> Posts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('media') ? 'active' : '' }}" href="#">
                        <i class="fas fa-photo-video"></i> Media
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pages') ? 'active' : '' }}" href="{{ route('menu.paginas') }}">
                        <i class="fas fa-file-alt"></i> Paginas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('appearance') ? 'active' : '' }}" href="#">
                        <i class="fas fa-paint-brush"></i> apariencia
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('plugins') ? 'active' : '' }}" href="#">
                        <i class="fas fa-plug"></i> Actividades
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="#">
                        <i class="fas fa-users"></i> Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('settings') ? 'active' : '' }}" href="#">
                        <i class="fas fa-cog"></i> Configuraciones
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item nav-item-logout">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Salir
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, y jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Toggle Sidebar para móviles -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>
</html>
