<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: inicio_sesion.php");
    exit();
}

$usuario = $_SESSION['usuario'];

// Manejo de la actualización de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar datos y actualizar el perfil
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $dni = trim($_POST['dni']);
    $telefono = trim($_POST['telefono']);
    $direccion = trim($_POST['direccion']);
    $genero = trim($_POST['genero']);

    // Aquí puedes agregar la lógica para actualizar en la base de datos
    // Suponiendo que la actualización fue exitosa
    $_SESSION['usuario']['nombre'] = $nombre;
    $_SESSION['usuario']['apellido'] = $apellido;
    $_SESSION['usuario']['dni'] = $dni;
    $_SESSION['usuario']['telefono'] = $telefono;
    $_SESSION['usuario']['direccion'] = $direccion;
    $_SESSION['usuario']['genero'] = $genero;

    $mensaje = "Datos actualizados correctamente.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .update-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: auto;
            border: 1px solid #e1e1e1;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .message {
            color: green;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .submit-button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }
        .submit-button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
    <script>
        function validateForm() {
            const fields = ['nombre', 'apellido', 'dni', 'telefono', 'direccion'];
            let isValid = true;
            fields.forEach(field => {
                const input = document.querySelector(`[name="${field}"]`);
                if (!input.value.trim()) {
                    isValid = false;
                    input.style.borderColor = 'red'; // Resaltar campo vacío
                } else {
                    input.style.borderColor = ''; // Resetear estilo
                }
            });
            return isValid;
        }
    </script>
</head>
<body>
    <div class="update-container">
        <h1>Modificar Datos</h1>
        
        <?php if (isset($mensaje)): ?>
            <div class="message"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>

        <form method="POST" action="" onsubmit="return validateForm()">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" value="<?php echo htmlspecialchars($usuario['apellido']); ?>" required>

            <label for="dni">DNI:</label>
            <input type="text" name="dni" value="<?php echo htmlspecialchars($usuario['dni']); ?>" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" value="<?php echo htmlspecialchars($usuario['direccion']); ?>" required>

            <label for="genero">Género:</label>
            <select name="genero" required>
                <option value="Masculino" <?php if ($usuario['genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                <option value="Femenino" <?php if ($usuario['genero'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
                <option value="Otro" <?php if ($usuario['genero'] == 'Otro') echo 'selected'; ?>>Otro</option>
            </select>

            <input type="submit" class="submit-button" value="Actualizar Datos">
        </form>
        <a href="perfil.php" style="display: block; text-align: center; margin-top: 20px;">Volver al perfil</a>
    </div>
</body>
</html>
