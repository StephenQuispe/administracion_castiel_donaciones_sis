<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .error { 
            color: red; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>
            <form action="login.php" method="post" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña2" class="form-label">Repetir Contraseña:</label>
                    <input type="password" class="form-control" id="contraseña2" name="contraseña2" required>
                </div>
                <span id="message" class="error"></span>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            const contraseña = document.getElementById('contraseña').value;
            const contraseña2 = document.getElementById('contraseña2').value;
            const message = document.getElementById('message');

            // Verificar si las contraseñas coinciden
            if (contraseña !== contraseña2) {
                message.textContent = "Las contraseñas no coinciden";
                return false;
            }
            return true;
        }

        // Validación en tiempo real
        const contraseña = document.getElementById('contraseña');
        const contraseña2 = document.getElementById('contraseña2');
        const message = document.getElementById('message');

        contraseña2.addEventListener('input', function () {
            if (contraseña.value !== contraseña2.value) {
                message.textContent = "Las contraseñas no coinciden";
            } else {
                message.textContent = "";
            }
        });
    </script>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "castiel_bd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $pass = $_POST['contraseña']; // Usar 'contraseña' en lugar de 'pass'
    $pass2 = $_POST['contraseña2']; // Verifica también la repetición de la contraseña

    // Verificar si las contraseñas coinciden
    if ($pass !== $pass2) {
        die("Las contraseñas no coinciden.");
    }

    // Usar consultas preparadas para evitar SQL Injection
    $stmt = $conn->prepare("SELECT id, contra FROM USUARIO WHERE usuario = ?");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar si la contraseña es correcta usando password_verify
        if ($pass === $row['contra']) {
            // Redirigir a monitoreo.php si el inicio de sesión es exitoso
            header("Location: monitoreo.php");
            exit();
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
}

$conn->close();
?>

