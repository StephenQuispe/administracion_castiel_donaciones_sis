<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .card {
            margin: 20px 0;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .section-header {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="section-header">Servicios de Donaciones</h1>

        <div class="row">
            <!-- Servicio de Donaciones -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Donaciones</h5>
                        <p class="card-text">Contribuye a mejorar la vida de muchas personas a través de tus donaciones.</p>
                        <a href="#" class="btn btn-primary">Hacer una Donación</a>
                    </div>
                </div>
            </div>

            <!-- Servicio de Campañas -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Campañas</h5>
                        <p class="card-text">Participa en nuestras campañas para apoyar diferentes causas.</p>
                        <a href="#" class="btn btn-primary">Ver Campañas</a>
                    </div>
                </div>
            </div>

            <!-- Servicio de Voluntarios -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Voluntarios</h5>
                        <p class="card-text">Sé parte activa del cambio. Únete como voluntario y ayuda en nuestras iniciativas.</p>
                        <a href="voluntarios.php" class="btn btn-custom">Ser Voluntario</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
