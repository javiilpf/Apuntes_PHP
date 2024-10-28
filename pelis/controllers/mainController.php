<?php
//cargamos el modelo
require_once("models/PeliModel.php");
require_once("models/PeliRepository.php");
require_once("models/UserModel.php");
require_once("models/UserRepository.php");

session_start();

if(isset($_GET['c'])){
    require_once('controllers/' . $_GET['c'] . 'Controller.php'); // controllers/ user
}

if(isset($_GET['i'])){
    require_once ("views/userInfo.phtml");
}

if(isset($_POST['borrar'])){
    PeliRepository::deleteMovies($_POST['id']);
}

if(isset($_POST['add'])){
    PeliRepository::addMovie($_POST['title'], $_POST['year'], $_POST['poster']);
}

if(isset($_POST['busca'])){
//usar el repositorio para cargar los datos
$movies=PeliRepository::getMovieByTitle($_POST['busca']);
}else {
$movies=PeliRepository::getMovies();
}

if(isset($_POST['Favorita'])){
    UserRepository::setFavorites($_SESSION['user']->getId(), $_GET['p']);
    //require_once ("views/ListView.php");
};

// cargar la vista
if(!isset($_SESSION['login'])){
    require_once 'views/loginView.phtml';
}else{
    require_once("views/ListView.phtml");
}

if(isset($_POST['logout'])){

    // logout en $_session
    require_once 'views/LoginView.phtml';
}
?>