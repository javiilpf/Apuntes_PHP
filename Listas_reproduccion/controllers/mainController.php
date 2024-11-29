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
    require_once(__DIR__ . '/../views/createListView.phtml');
    exit();
}

if (isset($_POST['añadir'])) {
    require_once(__DIR__ . '/../controllers/listController.php');
}

// Manejar la creación de nuevas canciones
if (isset($_POST['createSong'])) {
    require_once(__DIR__ . '/../views/createSongView.phtml');
    exit();
}

if (isset($_POST['añadirCancion'])) {
    require_once(__DIR__ . '/../controllers/songController.php');
}

// Manejar la búsqueda de canciones
if (isset($_POST['buscarSong'])) {
    require_once(__DIR__ . '/../controllers/searchController.php');
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

// Añadir canción a la lista
if (isset($_POST['AddSongToList'])) {
    require_once(__DIR__ . '/../controllers/addController.php');
}

// Manejar la acción de ver lista específica utilizando POST
if (isset($_POST['action']) && $_POST['action'] == 'viewList') {
    if (isset($_POST['listId'])) {
        $listId = intval($_POST['listId']); // Convertir el ID de la lista a número entero
        // Obtener los detalles de la lista
        $listTitle = ListRepository::getTitleOfListById($listId);

        // Obtener la lista de reproducción por ID
        $songsInList = AddRepository::GetSongsForList($listId, $_SESSION['user']->getId());

        // Mostrar los detalles de la lista de reproducción
        require_once __DIR__ . '/../views/detailListView.phtml';
        
    } else {
        echo "ID de la lista no proporcionado.";
    }
}
?>



