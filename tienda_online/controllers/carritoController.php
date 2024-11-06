<?php
    
    require_once("models/CarritoRepository.php");
    require_once("models/CarritoModel.php");
    require_once("models/OrderModel.php");
    require_once("models/OrderRepository.php");
    
    
    if(isset($_POST["addCarrito"])){
        $order=OrderRepository::getOrderByUserId($_SESSION['user']->getId());
        CarritoRepository::addCarrito($_POST['id'],  $order->getId(), $_POST['precio'], 1);
    };
    
    if(isset($_POST["eliminar"])){
        CarritoRepository::removeProductCarrito($_POST['id']);
    };

    if(isset($_POST['comprar'])){
        OrderRepository::updateOrderState(($_POST['id']), 1);
    }

    
?>