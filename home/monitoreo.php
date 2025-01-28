<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoreo de Donaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .active {
            background-color: #4CAF50;
            color: white;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table-container {
            margin-top: 50px;
        }
        h1 {
            color: #4CAF50;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <h1 class="text-center mb-4">Monitoreo de Estados de Donaciones</h1>
        <div class="text-end mb-3">
            <a href="index.php" class="btn btn-custom">Cerrar sesión</a>
        </div>
        <table class="table table-bordered table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Estado</th>
                    <!-- Columnas de donaciones dinámicas -->
                </tr>
            </thead>
            <tbody id="table-body">
                <!-- Filas generadas dinámicamente -->
            </tbody>
        </table>
    </div>

    <script>
        // Datos de ejemplo (n donaciones)
        const donaciones = [
            { id: 1, estado: 3 },
            { id: 2, estado: 2 },
            { id: 3, estado: 5 },
            { id: 4, estado: 1 },
            { id: 5, estado: 4 },
        ];

        // Lista de estados posibles
        const estados = ["Inicio", "En Progreso", "Medio", "Avanzado", "Terminado"];

        // Referencias a elementos HTML
        const tbody = document.getElementById("table-body");

        // Agregar columnas de donaciones al encabezado
        donaciones.forEach((donacion) => {
            const headerCell = document.createElement("th");
            headerCell.textContent = `Donación ${donacion.id}`;
            document.querySelector("thead tr").appendChild(headerCell);
        });

        // Generar filas de estados dinámicamente
        estados.forEach((estado, i) => {
            const row = document.createElement("tr");
            const estadoCell = document.createElement("td");
            estadoCell.textContent = estado; // Nombre del estado
            row.appendChild(estadoCell);

            // Crear columnas para cada donación
            donaciones.forEach((donacion) => {
                const cell = document.createElement("td");
                if (donacion.estado === i + 1) {
                    cell.classList.add("active");
                    cell.textContent = "🟢";
                }
                row.appendChild(cell);
            });

            tbody.appendChild(row);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
