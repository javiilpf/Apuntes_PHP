<?php
    require_once("models/UserModel.php");
    require_once("models/UserRepository.php");
    require_once("models/ProductRepository.php");
    require_once("models/OrderRepository.php");
    require_once("models/ProductModel.php");
    require_once("models/OrderModel.php");

    session_start();

    if(isset($_GET['a'])){
        require_once('views/addProductView.phtml');
    }

    if(isset($_GET['b'])){
        require_once('controllers/carritoController');
    }
    
    /**if (isset($_SESSION['login'])){
        OrderRepository::createOrder($_SESSION['user'] -> getId());
    }*/
   

    if(isset($_GET['c'])){
        require_once('controllers/' . $_GET['c'] . 'Controller.php'); // controllers/ user
    }

    $products=productRepository::showProducts();
    $productsCarrito= productRepository::showProducts(OrderRepository::getOrderByUserId($_SESSION['user']->getId())->getId());

    // cargar la vista
    if(!isset($_SESSION['login'])){
        require_once 'views/loginView.phtml';
    }else{
        
        if(!OrderRepository::getOrderByUserId($_SESSION['user']->getId())){
            OrderRepository::createOrder($_SESSION['user'] -> getId());
        };

        require_once("views/listView.phtml");
        
    }

    if(isset($_POST['logout'])){
        ob_clean();
        // logout en $_session
        require_once 'views/loginView.phtml';
    }


?>