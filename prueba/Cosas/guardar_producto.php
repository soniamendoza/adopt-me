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
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$stock = $_POST['stock'];


// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO productos (Nombre, Descripcion, Precio, Categoria, Stock) VALUES ('$nombre', '$descripcion','$precio', '$categoria', '$stock')";

// Ejecutar la consulta y verificar si se insertaron los datos correctamente
if ($conn->query($sql) === TRUE) {
    echo "Registro guardado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
