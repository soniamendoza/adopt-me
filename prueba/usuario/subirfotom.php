<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ver_mascota.php");
    exit();
}

$usuario = $_SESSION['usuario'];

// Manejo de la subida de la foto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])) {
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verifica si es una imagen
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check === false) {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verifica si el archivo ya existe
    if (file_exists($target_file)) {
        echo "Lo siento, la imagen ya existe.";
        $uploadOk = 0;
    }

    // Verifica el tamaño del archivo
    if ($_FILES["foto"]["size"] > 500000) { // 500 KB
        echo "Lo siento, el archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Permitir ciertos formatos de archivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }

    // Verifica si $uploadOk está configurado a 0 por un error
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no ha sido subido.";
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "La imagen " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " ha sido subida.";
            
            // Actualiza la información del usuario en la sesión o base de datos
            $_SESSION['usuario']['foto'] = $target_file; // Guarda la ruta de la foto en la sesión
            // Aquí también puedes guardar la ruta en la base de datos si es necesario
        } else {
            echo "Lo siento, hubo un error subiendo tu archivo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Foto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .upload-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: auto;
        }
        h1 {
            text-align: center;
        }
        input[type="file"] {
            display: block;
            margin: 20px auto;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h1>Subir Foto de Perfil</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="foto" required>
            <input type="submit" value="Subir Foto">
        </form>
        <a href="ver_mascota.php">Regresar al perfil</a>
    </div>
</body>
</html>
