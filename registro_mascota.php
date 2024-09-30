<?php
session_start();
$error = ''; // Variable para almacenar mensajes de error

// Asegúrate de que el usuario esté logueado y que su ID esté disponible en la sesión
if (!isset($_SESSION['id_usuario'])) {
    header("Location: inicio_sesion.html"); // Redirigir si no está logueado
    exit();
}

$id_usuario = $_SESSION['id_usuario']; // Obtener el ID del usuario de la sesión

// Configuración de la base de datos
$servername = "localhost";
$username = "root"; // Cambia si es necesario
$password = ""; // Cambia si es necesario
$dbname = "adoptme"; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $raza = $_POST['raza'];
    $especie = $_POST['especie'];
    $tamano = $_POST['tamano'];
    $estado = $_POST['estado'];
    $genero = $_POST['genero'];

    // Verificación de campos vacíos
    if (empty($nombre) || empty($edad) || empty($raza) || empty($especie) || empty($tamano) || empty($estado) || empty($genero)) {
        $error = 'Por favor, complete todos los campos.';
    } else {
        // Preparar y ejecutar la consulta SQL
        $stmt = $conn->prepare("INSERT INTO mascotas (id_usuario, nombre, edad, raza, especie, tamano, estado, genero) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssss", $id_usuario, $nombre, $edad, $raza, $especie, $tamano, $estado, $genero);

        if ($stmt->execute()) {
            $_SESSION['mensaje'] = 'Mascota registrada exitosamente.';
            header("Location: mascotas.html"); // Redirigir a una página de éxito
            exit();
        } else {
            $error = 'Error al registrar la mascota: ' . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mascota</title>
    <style>
        /* Aquí va el CSS, puedes usar el que ya tienes */
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrar Mascota</h2>
        <form action="" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>

            <label for="raza">Raza:</label>
            <input type="text" id="raza" name="raza" required>
            <small style="color: gray;">Si no conoce la raza, escriba 'Desconozco'</small>

            <select id="especie" name="especie" required>
            <option value="">Seleccione la especie</option>
            <option value="Perro">Perro</option>
            <option value="Gato">Gato</option>
            </select>

            <label for="tamano">Tamaño:</label>
            <select id="tamano" name="tamano" required>
                <option value="">Seleccione el tamaño</option>
                <option value="Pequeño">Pequeño</option>
                <option value="Mediano">Mediano</option>
                <option value="Grande">Grande</option>
            </select>

            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="">Seleccione el estado</option>
                <option value="Disponible">Disponible</option>
                <option value="Adoptado">Adoptado</option>
            </select>

            <label for="genero">Género:</label>
            <select id="genero" name="genero" required>
                <option value="">Seleccione el género</option>
                <option value="Macho">Masculino</option>
                <option value="hembra">Femenino</option>
            </select>

            <input type="submit" value="Registrar">
        </form>
        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
