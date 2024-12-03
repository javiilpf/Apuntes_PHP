<?php
require_once("/xampp/htdocs/proyecto_foro/models/UserModel.php");
require_once("/xampp/htdocs/proyecto_foro/models/UserRepository.php");

// Iniciar la sesión después de incluir las clases
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['login'])) {
    $user = UserRepository::login($_POST['username'], $_POST['password']);
    
    if ($user) {
        $_SESSION['login'] = true;
        $_SESSION['user'] = $user;
        header("Location: index.php"); // Redirigir después de iniciar sesión
        exit();
    } else {
        echo "Credenciales inválidas.";
    }
}

if (isset($_POST['registro'])) {
    require_once('views/createUserView.phtml');
    exit();
}

if (isset($_POST['newUser'])) {
    UserRepository::createUser($_POST['username'], $_POST['password']);
    header("Location: index.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_unset(); // Liberar todas las variables de sesión
    session_destroy(); // Destruir la sesión
    header("Location: index.php"); // Redirigir a la página de inicio
    exit();
}
?>







