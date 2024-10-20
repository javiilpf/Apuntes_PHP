<?php
    require_once("models/UserModel.php");
    require_once("models/UserRepository.php");

    if(isset($_POST['Login'])){
        
        UserRepository::login($_POST['user'],$_POST['password']);
    }
?>