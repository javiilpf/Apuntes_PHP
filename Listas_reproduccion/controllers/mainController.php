<?php
    require_once("models/UserModel.php");
    require_once("models/UserRepository.php");
    require_once("models/ListRepository.php");

    session_start();
    
    if(isset($_GET['c'])){
        require_once('controllers/' . $_GET['c'] . 'Controller.php');
        
    }


    //******----------------------------------CREAR LISTA EN CUENTA DE USUARIO--------------------------------------------******** */

    // PASOS NECESARIOS PARA AÑADIR UNA NUEVA LISTA EN LA CUENTA DEL USUARIO EN EL MAIN CONTROLLER
    // PRIMERO SI EL USUARIO PINCHA EL BOTON DE LISTVIEW DE CREAR UNA NUEVA LISTA LO MANDO AL CREATELIST.PHTML Y EL EXIT PARA QUE NO 
    //SALGA EL LISTVIEW
    if(isset($_POST['crearLista'])) {
        require_once('views/createList.phtml');
        exit();
    }
    // DESPUÉS CUANDO EL USUARIO PULSE EL BOTÓN DE AÑADIR EN EL CREATELIST DIRECTAMENTE LO MANDO AL LISTCONTROLLER PARA LLEVAR A CABO
    // LA ACCION NECESARIA

    if(isset($_POST['añadir'])){
        require_once('controllers/listController.php'); 
    }

    //******--------------------------------------------------------------------------------------------******** */


    //******-----------------------------------CREAR CANCION---------------------------------------------------------******** */

    // PASOS NECESARIOS PARA AÑADIR UNA CANCION A LA LISTA DEL USUARIO EN EL MAIN CONTROLLER
    // SI EL USUARIO PINCHA EL BOTON EN EL LISTVIEW DE AÑADIR UNA NUEVA CANCION LO MANDO AL CREATESONGVIEW PARA QUE HAGA EL FORMULARIO
    if(isset($_POST['createSong'])) {
        require_once('views/createSongView.phtml');
        exit();
    }
    // DESPUÉS CUANDO EL USUARIO PULSE EL BOTÓN DE añadirCancion EN EL CREATESONG DIRECTAMENTE LO MANDO AL SONGCONTROLLER PARA LLEVAR A CABO
    // LA ACCION NECESARIA
    if(isset($_POST['añadirCancion'])) {
        require_once('controllers/songController.php');
        
    }
    //******--------------------------------------------------------------------------------------------******** */


    //******-----------------------------------BUSCADOR-------------------------------------------------******** */

    // PASOS NECESARIOS PARA REALIZAR UNA BUSQUEDA EN EL MAIN CONTROLLER
    if(isset($_POST['buscarSong'])){
        require_once('controllers/searchController.php');  // Este controlador 
    }

    //******--------------------------------------------------------------------------------------------******** */

    if(!isset($_SESSION['login'])){
        require_once 'views/loginView.phtml';
    }else{
        $lists = ListRepository::showListForUser($_SESSION['user']);
        require_once("views/listView.phtml");
    }
    
    if(isset($_POST['logout'])){
        ob_clean();
        // logout en $_session
        session_destroy();
        require_once 'views/loginView.phtml';
    }
?>