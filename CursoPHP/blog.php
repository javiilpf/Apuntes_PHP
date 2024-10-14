<?php 
// Comienzo de la sesión
session_start();

// Conexión con la base de datos
$db = new mysqli('localhost', 'root', '', 'blog');

// Para indicar que la sesión se ha iniciado correctamente.
if (isset($info)) {
    echo "<script>alert('" . $info . "');</script>";
}

// Creación de una función que permite devolver los artículos ya creados
function devolverArticulos($db) {
    $q = "SELECT * FROM articulo WHERE visible = 1"; // Solo seleccionar artículos visibles
    $result = $db->query($q);
    $articulos = array();
    while ($row = $result->fetch_assoc()) {
        $articulos[] = $row;
    }
    return $articulos;
}

// Manejar ocultación de artículos
if (isset($_POST['ocultar']) && isset($_POST['id_articulo'])) {
    $id_articulo = $_POST['id_articulo'];
    $q_hide = "UPDATE articulo SET visible = 0 WHERE id = '$id_articulo'";
    $db->query($q_hide);
}

$articulos = devolverArticulos($db);

// Manejo del inicio de sesión
if (isset($_POST['login'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $q = "SELECT * FROM login WHERE user='$username'";
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            if ($row['password'] == $password) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['user'];
            } else {
                echo "<p>Contraseña incorrecta.</p>";
            }
        } else {
            echo "<p>Usuario no existe.</p>";
        }
    }
}

// Manejo del cierre de sesión
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']); // Redirigir a la misma página
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Mi Sitio Web</h1>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
        <!-- Formulario de login -->
        <form method="post" action="">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="submit" name="login" value="Iniciar sesión">
        </form>
    </header>
    
    <main>
    <?php
    foreach ($articulos as $articulo) {
        echo "<div class='articulo'>";
        echo "<img src='./img/" . $articulo['imagen'] . "' width='100px'>";
        echo "<p><strong>" . $articulo['fecha'] . " " . $articulo['id_user'] . "</strong><br>" . $articulo['texto'] . "</p>";
        
        // Mostrar el botón de ocultar y formulario de comentarios solo si el usuario está logueado
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='id_articulo' value='" . $articulo['id'] . "'>";
            echo "<input type='submit' name='ocultar' value='Ocultar'>";
            echo "</form>";

            // Mostrar formulario de comentarios solo si el usuario está logueado
            echo "<form method='post' action=''>";
            echo "<input type='text' name='comentario' placeholder='Escribe un comentario'>";
            echo "<input type='submit' name='comentar' value='Comentar'>";
            echo "</form>";
        } else {
            echo "<p>Inicia sesión para comentar.</p>";
        }
        
        echo "</div>";
    }
    
    if (isset($_POST['añadir']) && isset($_POST['texto']) && isset($_POST['fecha']) && isset($_FILES['imagen'])) {
        $texto = $_POST['texto'];
        $fecha = $_POST['fecha'];
        $imagen = $_FILES['imagen']['name'];
        $q2 = "INSERT INTO `articulo` (`id`, `texto`, `fecha`, `id_user`, `imagen`, `visible`) VALUES (NULL, '$texto', '$fecha', 'javiilpf', '$imagen', 1)";
        $db->query($q2);
    }
    ?>
    </main>

    <footer>
        <?php
        // Mostrar mensaje de bienvenida o aviso de sesión
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            echo "Bienvenido! " . $_SESSION['username'] . " <a href='?logout=1'>Cerrar sesión</a>";
        } else {
            echo "¡Todavía no has iniciado sesión! Estás como: " . (isset($_SESSION['username']) ? $_SESSION['username'] : 'invitado');
        }
        ?>
    </footer>
</body>
</html>
