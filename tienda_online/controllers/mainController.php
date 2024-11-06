<?php
    require_once("models/UserModel.php");
    require_once("models/UserRepository.php");
    require_once("models/ProductRepository.php");
    require_once("models/OrderRepository.php");
    require_once("models/ProductModel.php");
    require_once("models/OrderModel.php");
    require_once("models/CarritoRepository.php");

    session_start();
    

    if(isset($_GET['c'])){
        require_once('controllers/' . $_GET['c'] . 'Controller.php'); // controllers/ user
    }

    if (isset($_SESSION['login'])){
        
        if(!OrderRepository::getOrderByUserId($_SESSION['user']->getId())||OrderRepository::getOrderByUserId($_SESSION['user']->getId())->getId()==1){
            OrderRepository::createOrder($_SESSION['user'] -> getId());
        };
        $order=OrderRepository::getOrderByUserId($_SESSION['user']->getId());
        $productsCarrito= carritoRepository::getProductCarrito(OrderRepository::getOrderByUserId($_SESSION['user']->getId())->getId());
    }

    if(isset($_POST['agregar'])){
        require_once('views/addProductView.phtml');
        exit();
    }
    if (isset($_POST['create'])){
        require_once('controllers/productController.php');
    }
    if (isset($_POST['modificar'])){
        require_once('views/modifyUsers.phtml');
        exit();
    }
    if (isset($_POST['makeAdmin'])){
        require_once('controllers/userController.php');
    }

    if(isset($_POST['carrito'])){
        
        require_once("views/carritoView.phtml");
        exit();
    };

    if(isset($_POST['eliminar'])){
        require_once('controllers/carritoController.php');
    };
    
    if(isset($_POST['comprar'])){
        require_once('controllers/carritoController.php');
        header("location: index.php");
        exit();
    }

    

    $products=productRepository::showProducts();

    if(isset($_GET['b'])){
        require_once('controllers/carritoController.php');
        header("location: index.php");
        exit();
    }

    if(!isset($_SESSION['login'])){
        require_once 'views/loginView.phtml';
    }else{
        require_once("views/listView.phtml");
    }
    if(isset($_POST['list'])){
        require_once("views/listView.phtml");
        
    };
    
    /**if (isset($_SESSION['login'])){
        OrderRepository::createOrder($_SESSION['user'] -> getId());
    }*/

    // cargar la vista
    

    if(isset($_POST['logout'])){
        ob_clean();
        // logout en $_session
        session_destroy();
        require_once 'views/loginView.phtml';
    }


?>