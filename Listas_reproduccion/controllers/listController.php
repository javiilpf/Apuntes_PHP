<?php
    require_once("models/ListModel.php");
    require_once("models/ListRepository.php");
    
    if (isset($_POST['añadir'])){
        
        ListRepository::createListForUser($_SESSION['user']->getId(), $_POST['title']);
       
        
    }
?>