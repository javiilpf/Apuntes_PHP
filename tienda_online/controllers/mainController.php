<?php
    require_once("models/UserModel.php");
    require_once("models/UserRepository.php");


    session_start();

    if(isset($_GET['c'])){
        require_once('controllers/' . $_GET['c'] . 'Controller.php'); // controllers/ user
    }

    if(isset($_GET['a'])){
        require_once('views/addProductView.phtml');
    }
    // cargar la vista
    // cargar la vista
    if(!isset($_SESSION['login'])){
        require_once 'views/loginView.phtml';
    }else{
        
        require_once("views/listView.phtml");
        
    }

    if(isset($_POST['logout'])){
        ob_clean();
        // logout en $_session
        require_once 'views/loginView.phtml';
    }


?>