<?php
// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir los modelos y repositorios necesarios con las rutas correctas
require_once("/xampp/htdocs/proyecto_foro/models/UserModel.php");
require_once("/xampp/htdocs/proyecto_foro/models/UserRepository.php");
require_once("/xampp/htdocs/proyecto_foro/models/ForoModel.php");
require_once("/xampp/htdocs/proyecto_foro/models/ForoRepository.php");

// Iniciar la sesión después de incluir las clases
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET["n"])) {
    require_once("/xampp/htdocs/proyecto_foro/controllers/loginController.php");
    exit();
}

if (isset($_GET["c"])) {
    require_once("/xampp/htdocs/proyecto_foro/controllers/loginController.php");
    exit();
}

if (isset($_POST["registro"])) {
    require_once("/xampp/htdocs/proyecto_foro/controllers/loginController.php");
    exit();
}

if (isset($_POST["newUser"])) {
    require_once("/xampp/htdocs/proyecto_foro/controllers/loginController.php");
    exit();
}

// Por defecto, cargar la vista del foro
require_once("/xampp/htdocs/proyecto_foro/views/foroView.phtml");
?>

