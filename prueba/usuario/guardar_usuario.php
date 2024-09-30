<?php
$servername = "localhost";
$username = "root"; // Cambia si es necesario
$password = ""; // Cambia si es necesario
$dbname = "adoptme"; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparar y enlazar
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, dni, correo_electronico, telefono, direccion, genero, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// Asegúrate de que todas estas variables están definidas
$stmt->bind_param("ssssssss", $nombre, $apellido, $dni, $correo_electronico, $telefono, $direccion, $genero, $contrasena);

// Ejemplo de asignación de valores
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$correo_electronico = $_POST['correo_electronico'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$genero = $_POST['genero'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);


// Ejecutar la consulta
if ($stmt->execute()) {
    echo "inicio Exitoso";
    header("Location: inicio_Sesion.html");
} else {
    echo "Error: " . $stmt->error;
}


// Cerrar conexión
$stmt->close();
$conn->close();
?>
