<?php
// Incluir los modelos y repositorios necesarios con las rutas correctas
require_once(__DIR__ . '/../db.php');
require_once(__DIR__ . '/../models/UserModel.php');
require_once(__DIR__ . '/../models/UserRepository.php');
require_once(__DIR__ . '/../models/ListRepository.php');
require_once(__DIR__ . '/../models/AddRepository.php');
require_once(__DIR__ . '/../models/AddModel.php');
require_once(__DIR__ . '/../models/SongRepository.php');
require_once(__DIR__ . '/../models/SongModel.php');

session_start(); // Iniciar la sesión

// Manejar el controlador basado en el parámetro GET 'c'
if (isset($_GET['c'])) {
    require_once(__DIR__ . '/../controllers/' . htmlspecialchars($_GET['c']) . 'Controller.php');
}

// Manejar la creación de nuevas listas
if (isset($_POST['crearLista'])) {
    require_once('/xampp/htdocs/Listas_reproduccion/controllers/listController.php');
    exit();
}

if (isset($_POST['añadir'])) {
    require_once(__DIR__ . '/../controllers/listController.php');
    exit();
}

if (isset($_POST['createSong'])) {
    require_once('/xampp/htdocs/Listas_reproduccion/controllers/songController.php');
    exit();
}

if (isset($_POST['añadirCancion'])) {
    require_once(__DIR__ . '/../controllers/songController.php');
}

// Manejar la búsqueda de canciones
if (isset($_POST['buscarSong'])) {
    require_once(__DIR__ . '/../controllers/searchController.php');
}

// Añadir canción a la lista
if (isset($_GET['s'])) {
    require_once(__DIR__ . '/../controllers/' . htmlspecialchars($_GET['s']) . 'Controller.php');
    header('Location: index.php');
    exit;

}
if (isset($_GET['w'])) {
    require_once(__DIR__ . '/../controllers/' . htmlspecialchars($_GET['w']) . 'Controller.php');
    exit();
}
if (isset($_GET['a'])) {
    require_once("/xampp/htdocs/Listas_reproduccion/controllers/detailListController.php");
    exit();
}

// Mostrar el login si no está logueado
if (!isset($_SESSION['login'])) {
    require_once __DIR__ . '/../views/loginView.phtml';
} else {
    $lists = ListRepository::showListForUser($_SESSION['user']);
    require_once(__DIR__ . '/../views/listView.phtml');
    
}
// Manejar el logout
if (isset($_POST['logout'])) {
    ob_clean();
    session_destroy();
    require_once __DIR__ . '/../views/loginView.phtml';
}
?>



