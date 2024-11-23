<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar vh-100">
                <div class="p-3">
                    <h4 class="text-center">PataSana</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ route('home.index') }}" class="nav-link text-white">
                                <i class="fi fi-rr-house-chimney"></i> <span>Inicio</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pets.index') }}" class="nav-link text-white">
                                <i class="fi fi-rr-paw"></i> <span>Mascotas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('offerings.index') }}" class="nav-link text-white">
                                <i class="fi fi-rr-time-twenty-four"></i> <span>Servicios</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('appointments.index') }}" class="nav-link text-white">
                                <i class="fi fi-rr-calendar-clock"></i> <span>Citas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('trashed.index') }}" class="nav-link text-white">
                                <i class="fi fi-rr-recycle"></i><span>Eliminados</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="py-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
