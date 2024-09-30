<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: inicio_sesion.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$fotoPerfil = isset($usuario['foto']) ? $usuario['foto'] : 'default.jpg'; // Cambia 'default.jpg' por una imagen predeterminada
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Asegura que el body ocupe al menos toda la altura de la ventana */
        }
        header {
            background-color: #87ceeb; /* Celeste más oscuro */
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            position: relative; /* Para el logo */
            border-bottom: 4px solid gray; /* Borde gris en la parte superior */
        }
        .header-logo {
            height: 70px; /* Altura del logo */
            border-radius: 50%; /* Circular */
            object-fit: cover; /* Ajuste de imagen */
            position: absolute; /* Posiciona el logo de forma absoluta respecto a su contenedor relativo más cercano */
            top: 10px; /* Distancia desde el top del header */
            left: 20px; /* Distancia desde el lado izquierdo del header */
        }
        nav {
            margin: 10px 0;
        }
        nav a {
            margin: 0 15px;
            color: #fff;
            text-decoration: none;
            padding: 10px 15px; /* Espaciado interno para los enlaces */
            border-radius: 5px; /* Bordes redondeados */
            transition: background-color 0.3s; /* Transición suave al pasar el mouse */
        }
        nav a:hover {
            background-color: rgba(255, 255, 255, 0.3); /* Fondo blanco semi-transparente al pasar el mouse */
        }
        main {
            padding: 20px;
            flex: 1; /* Permite que el main ocupe el espacio disponible */
            text-align: center;
        }
        .profile-container {
            background-color: white;
            border-radius: 8px;
            border: 4px solid transparent;
            border-image: linear-gradient(to right, #87ceeb, #ffb6c1) 1; /* Borde celeste y rosado */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            max-width: 500px;
            margin: auto;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        img {
            max-width: 80%;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .nav-button {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .nav-button:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #9370db; /* Violeta */
            color: #fff;
            text-align: center;
            padding: 10px 0;
            border-top: 4px solid gray; /* Borde gris en la parte inferior */
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <img src="Logo.png" alt="Logo" class="header-logo">
    <h1>Bienvenido a Adopt-me</h1>
    <nav>
        <a href="principal.html"><i class="fas fa-home"></i>Inicio</a>
        <a href="ver_mascotas.php"><i class="fas fa-paw"></i>Mascotas</a>
        <a href="catalogo.php"><i class="fas fa-shopping-cart"></i>Tienda</a>
        <a href="perfil.php"><i class="fas fa-user"></i>Perfil</a>
    </nav>
</header>

<main>
    <div class="profile-container">
        <h1>Bienvenido, <?php echo htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']); ?></h1>
        <img src="<?php echo htmlspecialchars($fotoPerfil); ?>" alt="Foto de perfil">
        <div class="profile-info">
            <p><strong>DNI:</strong> <?php echo htmlspecialchars($usuario['dni']); ?></p>
            <p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['correo_electronico']); ?></p>
            <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($usuario['telefono']); ?></p>
            <p><strong>Dirección:</strong> <?php echo htmlspecialchars($usuario['direccion']); ?></p>
            <p><strong>Género:</strong> <?php echo htmlspecialchars($usuario['genero']); ?></p>
        </div>

        <a class="nav-button" href="subirfoto.php">Subir Foto</a>
        <a class="nav-button" href="modicardatos.php">Modificar Datos</a>
        <a class="nav-button" href="cerrar_sesion.php">Cerrar Sesión</a>
    </div>
</main>

<footer>
    <p>&copy; 2024 Mi Página de Adopcion</p>
</footer>

</body>
</html>
