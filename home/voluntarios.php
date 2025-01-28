<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Voluntario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .confirmation-message {
            background-color: #28a745;
            color: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Formulario para Voluntarios</h2>
            <form id="voluntarioForm">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="mb-3">
                    <label for="experiencia" class="form-label">¿Tienes experiencia en voluntariado?</label>
                    <textarea class="form-control" id="experiencia" name="experiencia" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="interes" class="form-label">¿Por qué te interesa ser voluntario?</label>
                    <textarea class="form-control" id="interes" name="interes" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Enviar Solicitud</button>
            </form>

            <div class="confirmation-message" id="confirmationMessage">
                <p><strong>¡Gracias por tu Solicitud!</strong></p>
                <p>Tu solicitud para ser voluntario ha sido enviada con éxito. Nos pondremos en contacto contigo pronto.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Función para mostrar el mensaje de confirmación
        document.getElementById('voluntarioForm').addEventListener('submit', function(event) {
            event.preventDefault();  // Prevenir el envío real del formulario

            // Mostrar el mensaje de confirmación
            document.getElementById('confirmationMessage').style.display = 'block';

            // Limpiar el formulario
            document.getElementById('voluntarioForm').reset();
        });
    </script>
</body>
</html>
