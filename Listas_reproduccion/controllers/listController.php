<?php
    require_once("models/ListModel.php");
    require_once("models/ListRepository.php");
    require_once("models/AddRepository.php");
    require_once("models/AddModel.php");
    
    if (isset($_POST['añadir'])){
       ListRepository::createListForUser($_SESSION['user']->getId(), $_POST['title']);
    }
    if (isset($_POST['crearLista'])) {
        require_once(__DIR__ . '/../views/createListView.phtml');
    }

?>