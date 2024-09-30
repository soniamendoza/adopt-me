<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Cambia según tu configuración
$user = "root"; // Usuario de MySQL
$password = ""; // Contraseña de MySQL
$dbname = "adoptme"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$DNI = $_POST['DNI'];
$contrasena = $_POST['contrasena'];
$telefono = $_POST['telefono'];

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO usuarios (Nombre, Apellido, DNI ,Correo_electronico, telefono, Contrasena) VALUES ('$nombre', '$apellido','$DNI', '$email', '$telefono' , '$contrasena')";

// Ejecutar la consulta y verificar si se insertaron los datos correctamente
if ($conn->query($sql) === TRUE) {
    echo "Registro guardado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
