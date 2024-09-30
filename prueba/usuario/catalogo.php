<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
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
            position: relative;
            border-bottom: 4px solid gray; /* Borde gris en la parte inferior */
        }
        .header-logo {
            height: 70px; /* Altura del logo */
            border-radius: 50%; /* Circular */
            object-fit: cover; /* Ajuste de imagen */
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
            flex: 1; /* Permite que el main ocupe el espacio disponible */
            text-align: center;
        }
        .catalog-container {
            background-color: white;
            border-radius: 8px;
            border: 4px solid transparent;
            border-image: linear-gradient(to right, #87ceeb, #ffb6c1) 1; /* Borde celeste y rosado */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            max-width: 800px;
            margin: auto;
        }
        .search-container {
            margin-bottom: 20px;
        }
        .search-input {
            padding: 10px;
            width: calc(100% - 22px);
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .product {
            border: 1px solid #eee;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            text-align: left;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        .product img {
            width: 80px; /* Tamaño de la imagen */
            height: auto;
            margin-right: 15px;
        }
        .product:hover {
            background-color: #f0f0f0;
        }
        footer {
            background-color: #9370db; /* Violeta */
            color: #fff;
            text-align: center;
            padding: 10px 0;
            border-top: 4px solid gray; /* Borde gris en la parte superior */
            width: 100%;
        }

        /* Estilo del modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .buy-button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .buy-button:hover {
            background-color: #218838;
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
    <div class="catalog-container">
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Buscar productos por nombre o etiqueta..." />
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2 id="modal-title"></h2>
                <p id="modal-description"></p>
                <p><strong>Precio: $<span id="modal-price"></span></strong></p>
                <button class="buy-button">Comprar</button>
            </div>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2024 Mi Página de Mascotas</p>
</footer>

<script>
function openModal(title, description, price) {
    document.getElementById("modal-title").innerText = title;
    document.getElementById("modal-description").innerText = description;
    document.getElementById("modal-price").innerText = price.toFixed(2);
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
