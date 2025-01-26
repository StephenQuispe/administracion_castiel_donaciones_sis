<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundación Castiel - Administración</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            background-color: #343a40;
            color: #fff;
            padding: 1rem;
            width: 250px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 0.5rem 0;
        }

        .sidebar a:hover {
            background-color: #495057;
            border-radius: 5px;
        }

        .main-content {
            flex-grow: 1;
            padding: 2rem;
        }

        .grid-button {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
            color: #fff;
            font-weight: bold;
            text-align: center;
            border-radius: 10px;
        }

        .btn-blue {
            background-color: #007bff;
        }

        .btn-orange {
            background-color: #fd7e14;
        }

        .btn-red {
            background-color: #dc3545;
        }

        .btn-green {
            background-color: #28a745;
        }

        .btn-gray {
            background-color: #6c757d;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h3 class="text-center">Fundación Castiel</h3>
        <ul class="list-unstyled">
            <li><a href="#">Configuración</a></li>
            <li><a href="#">Gestión de Donaciones</a></li>
            <li><a href="#">Gestión de Campañas</a></li>
            <li><a href="#">Noticias</a></li>
            <li><a href="#">Voluntarios</a></li>
            <li><a href="#">Gestión de Donantes</a></li>
            <li><a href="#">Gestión de Beneficiarios</a></li>
            <li><a href="#">Gestión de Usuarios</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1 class="text-center mb-4">Panel de Administración</h1>
        <div class="grid-container">
            <div class="grid-button btn-blue">GESTIÓN DE USUARIOS</div>
            <div class="grid-button btn-blue">GESTIÓN DE DONACIONES</div>
            <div class="grid-button btn-orange">GESTIÓN DE CAMPAÑAS</div>
            <div class="grid-button btn-gray">NOTICIAS</div>
            <div class="grid-button btn-red">VOLUNTARIOS</div>
            <div class="grid-button btn-green">GESTIÓN DE DONANTES</div>
            <div class="grid-button btn-gray">GESTIÓN DE BENEFICIARIOS</div>
        </div>
    </div>

    <!-- Enlace a Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
