<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Laravel 13 - @yield('title', 'Nombres')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">
    <style>td, .card-title { overflow-wrap: anywhere; } .acciones { min-width: 230px; } .form-control { max-width: 100%; }</style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gestión de Nombres</h1>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="status">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif
        @yield('content')
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
</body>
</html>
