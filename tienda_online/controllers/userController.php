<?php
    require_once("models/UserModel.php");
    require_once("models/ProductModel.php");
    require_once("models/UserRepository.php");


    if(isset($_POST['login'])){
        
        UserRepository::login($_POST['user'],$_POST['password']);
    }
    if (isset($_POST['create'])){
        
        UserRepository::addProduct($_POST['name'], $_POST['description'], $_POST['image'], $_POST['price'], $_POST['stock']);
    }
?>