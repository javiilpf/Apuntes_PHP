<?php
//cargamos el modelo
require_once("models/PeliModel.php");
require_once("models/PeliRepository.php");

if(isset($_GET['c'])){
    require_once('controllers/' . $_GET['c'] . 'Controller.php'); // controllers/ user
}

if(isset($_POST['borrar'])){
    PeliRepository::deleteMovies($_POST['id']);
}

if(isset($_POST['add'])){
    PeliRepository::addMovie($_POST['title'], $_POST['year'], $_POST['poster'], $_POST['likes']);
}

if(isset($_POST['busca'])){
//usar el repositorio para cargar los datos
$movies=PeliRepository::getMovieByTitle($_POST['busca']);
}else {
$movies=PeliRepository::getMovies();
}


// cargar la vista

if(!isset($_SESSION['login'])){
    require_once 'views/loginView.phtml';
}else{
    require_once("views/ListView.phtml");
}

if(isset($_POST['logout'])){
    require_once 'views/NewSession.phtml';
}

?>