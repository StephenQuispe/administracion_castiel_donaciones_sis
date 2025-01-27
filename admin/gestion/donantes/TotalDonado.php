<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donantes</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Donantes</h1>

<?php
// Configuración de la base de datos
$servidor = "localhost";
$usuario = "root"; // Usuario por defecto de XAMPP
$contrasena = ""; // Contraseña por defecto de XAMPP (vacía)
$base_datos = "castiel_bd";

// Crear la conexión
$conn = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener datos de la tabla
$sql = "SELECT  p.id_persona,
                p.nombre,
	            p.ap_paterno,
                p.ap_materno,
                SUM(don.valor_economico) AS total_donado
        FROM persona p 
        JOIN donante d ON d.id_persona = p.id_persona
        JOIN donacion don ON don.id_donante = d.id_donante
        WHERE d.frecuencia = 'Unica'
        GROUP BY p.id_persona
        ORDER BY total_donado DESC;";
$resultado = $conn->query($sql);

echo "<div class='text-right'>
        <a href='../../fpdf/TotalDonadoPDF_H.php' target='_blank'class='btn btn-success'>Generar Reporte</a>
      </div>";

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    echo "<table class='table table-striped table-bordered'>";
    echo "<thead class='table-dark'>  
            <tr>
                <th>ID</th>
                <th>Nombre</th>                
                <th>Total Donado</th>
            </tr>
          </thead>";
    // Mostrar cada fila de la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>" . $fila["id_persona"] . "</td>
                <td>" . $fila["nombre"] . " " . $fila["ap_paterno"] . " " . $fila["ap_materno"] ."</td>
                <td>" . $fila["total_donado"] . "</td>                
              </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>
</div>
<!-- Enlace a Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
