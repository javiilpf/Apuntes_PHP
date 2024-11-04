<?php
    require_once("models/UserModel.php");
    require_once("models/UserRepository.php");

    if(isset($_POST['login'])){
        
        UserRepository::login($_POST['user'],$_POST['password']);
        
    }

    if(isset($_POST['registro'])){
        require_once('views/createUser.phtml');
        exit();
        
    }

    if(isset($_POST['newUser'])){
        UserRepository::createUser($_POST['username'],$_POST['password']);
        header("location: index.php");
        exit();
    }

?>

<!-- Mostrar los productos -->
<!-- Crear una nueva vista para crear usuarios -->