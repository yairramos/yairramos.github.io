<?php
session_start(); // Iniciar sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    // Si no está autenticado, redirigir al login
    header('Location: login.php');
    exit;
}

// Dependiendo del tipo de usuario, se mostrarán diferentes enlaces
$tipo_usuario = $_SESSION['tipo_usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        /* Barra de navegación */
        nav {
            background-color: #333;
            padding: 10px 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }

        nav ul li a:hover {
            background-color: #555;
            border-radius: 5px;
        }

        /* Título */
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        /* Contenedor principal */
        main {
            padding: 20px;
            max-width: 1000px;
            margin: auto;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Botones adicionales (opciones de personal) */
        .btn {
            text-decoration: none;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            margin: 10px;
            display: inline-block;
        }

        .btn-logout {
            background-color: #f44336;
        }

        .btn:hover {
            background-color: #e53935;
        }

    </style>
</head>
<body>
    <!-- Título de la página -->
    <h1>Bienvenido a la Gestión de Biblioteca</h1>

    <!-- Barra de navegación -->
    <nav>
        <ul>
            <li><a href="index.php?page=libros">Lista de Libros</a></li>

            <!-- Mostrar opciones adicionales si el usuario es personal -->
            <?php if ($tipo_usuario == 'personal'): ?>
                <li><a href="index.php?page=usuarios">Gestión de Usuarios</a></li>
                <li><a href="index.php?page=reservaciones">Gestión de Reservaciones</a></li>
                <li><a href="index.php?page=prestamos">Gestión de Préstamos</a></li>
                <li><a href="index.php?page=informes">Informes y Estadísticas</a></li>
            <?php endif; ?>

            <!-- Opción de cerrar sesión para todos los usuarios -->
            <li><a href="logout.php" class="btn btn-logout">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <main>
        <?php
        // Cargar las rutas de manera directa
        require_once 'routes.php';
        ?>
    </main>
</body>
</html>
