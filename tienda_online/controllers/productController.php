<?php
    require_once("models/ProductModel.php");
    
    if (isset($_POST['create'])){
        
        UserRepository::addProduct($_POST['name'], $_POST['description'], $_POST['image'], $_POST['price'], $_POST['stock']);
        header("location: index.php");
        exit();
    }
?>