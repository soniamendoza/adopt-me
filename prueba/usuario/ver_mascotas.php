<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #87ceeb;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            position: relative;
            border-bottom: 4px solid gray;
        }
        .header-logo {
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            position: absolute;
            top: 10px;
            left: 20px;
        }
        nav {
            margin: 10px 0;
        }
        nav a {
            margin: 0 15px;
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav a:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }
        main {
            padding: 20px;
            flex: 1;
            text-align: center;
        }
        .catalog-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .pet {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            width: 200px;
            text-align: center;
        }
        .pet img {
            width: 100%;
            border-radius: 8px;
        }
        footer {
            background-color: #9370db;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            border-top: 4px solid gray;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <img src="Logo.png" alt="Logo" class="header-logo">
    <h1>Bienvenido a Adopt-me</h1>
    <nav>
        <a href="principal.html"><i class="fas fa-home"></i> Inicio</a>
        <a href="ver_mascotas.php"><i class="fas fa-paw"></i> Mascotas</a>
        <a href="catalogo.php"><i class="fas fa-shopping-cart"></i> Tienda</a>
        <a href="perfil.php"><i class="fas fa-user"></i> Perfil</a>
    </nav>
</header>

<main>
    <h2>Mascotas Disponibles</h2>
    <div class="catalog-container">
        <?php
        $servername = "localhost";
        $username = "root"; // Cambia si es necesario
        $password = ""; // Cambia si es necesario
        $dbname = "adoptme"; // Cambia esto por el nombre de tu base de datos
        
        // Conexión a la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para obtener las mascotas
        $sql = "SELECT id_mascota, id_usuario, nombre, edad, raza, especie, tamano, estado, genero FROM mascotas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Salida de cada mascota
            while ($row = $result->fetch_assoc()) {
                echo "<div class='pet' onclick=\"openModal('{$row['nombre']}', '{$row['especie']}', '{$row['edad']}', '{$row['raza']}', '{$row['tamano']}', '{$row['estado']}', '{$row['genero']}')\">";
                echo "<img src='ruta_imagen/{$row['id_usuario']}.jpg' alt='{$row['nombre']}'>"; // Cambia esto según tu lógica de imágenes
                echo "<h3>{$row['nombre']}</h3>";
                echo "<p>{$row['especie']}, {$row['edad']}, {$row['estado']}</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay mascotas disponibles en este momento.</p>";
        }

        $conn->close();
        ?>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modal-name"></h2>
            <p><strong>Especie:</strong> <span id="modal-species"></span></p>
            <p><strong>Edad:</strong> <span id="modal-age"></span></p>
            <p><strong>Raza:</strong> <span id="modal-breed"></span></p>
            <p><strong>Tamaño:</strong> <span id="modal-size"></span></p>
            <p><strong>Estado:</strong> <span id="modal-status"></span></p>
            <p><strong>Género:</strong> <span id="modal-gender"></span></p>
        </div>
    </div>
    
</main>
<button class="add-pet-button" onclick="location.href='registro_mascota.html'">
        <i class="fas fa-plus"></i> Añadir Mascota
    </button>

<footer>
    <p>&copy; 2024 Página de Mascotas</p>
</footer>

<script>
function openModal(name, species, age, breed, size, status, gender) {
    document.getElementById("modal-name").innerText = name;
    document.getElementById("modal-species").innerText = species;
    document.getElementById("modal-age").innerText = age;
    document.getElementById("modal-breed").innerText = breed;
    document.getElementById("modal-size").innerText = size;
    document.getElementById("modal-status").innerText = status;
    document.getElementById("modal-gender").innerText = gender;
    document.getElementById("myModal").style.display = "block";
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

// Cerrar el modal si se hace clic fuera de él
window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
