<?php
//cargamos el modelo
require_once("models/PeliModel.php");
require_once("models/PeliRepository.php");

if (isset($_POST['likes'])){
    PeliRepository::like($_POST['like']);
}

if (isset($_POST['borrar'])){
    PeliRepository::borrarPelis($_POST['id']);
}

if (isset($_POST['add'])){
    PeliRepository::añadirPelis($_POST['title'],$_POST['year'], $_POST['poster'], $_POST['likes']);
}

if(isset($_POST['busca'])){
//usar el repositorio para cargar los datos
$movies=PeliRepository::getMovieByTitle($_POST['busca']);
}else 
$movies=PeliRepository::getMovies();


// cargar la vista
require_once("views/ListView.phtml");
?>