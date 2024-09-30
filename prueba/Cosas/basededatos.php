<?php

// Crear conexión
$conn = new mysqli("127.0.0.1", "root", "", "adoptme");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa!";
}

// Cerrar la conexión
$conn->close();

?>
