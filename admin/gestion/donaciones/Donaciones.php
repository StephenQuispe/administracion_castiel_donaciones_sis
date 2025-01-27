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
    <h1 class="text-center mb-4">Donaciones</h1>

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
$sql = "SELECT d.id_donacion AS id,
               d.fecha_donacion AS fecha,
               d.valor_economico AS valor,
               d.p_acopio AS acopio,
               pe.nombre AS nom,
               pe.ap_paterno AS pat,
               pe.ap_materno AS mat,
               pr.nombre_proyecto AS proyecto
        FROM donacion d
        JOIN donante do on do.id_donante = d.id_donante
        JOIN persona pe on pe.id_persona = do.id_persona
        JOIN proyecto pr on pr.id_proyecto = d.id_proyecto";
$resultado = $conn->query($sql);

echo "<div class='text-right'>
        <a href='fpdf/DonantesPDF_H.php' target='_blank'class='btn btn-success'>Generar Reporte</a>
      </div>";

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    echo "<table class='table table-striped table-bordered'>";
    echo "<thead class='table-dark'>  
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Proyecto</th>
                <th>Fecha</th>
                <th>Valor Economico</th>
                <th>P. Acopio</th>   
                <th></th>         
            </tr>
          </thead>";
    // Mostrar cada fila de la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>" . $fila["id"] . "</td>
                <td>" . $fila["nom"] . " " . $fila["pat"] . " " . $fila["mat"] ."</td>
                <td>" . $fila["proyecto"] . "</td>
                <td>" . $fila["fecha"] . "</td>
                <td>" . $fila["valor"] . "</td>
                <td>" . $fila["acopio"] . "</td>
                <td>
                    <a href='' class='btn btn-warning'>Editar</a>
                    <a href='' class='btn btn-danger'>Eliminar</a>                    
                </td>
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
