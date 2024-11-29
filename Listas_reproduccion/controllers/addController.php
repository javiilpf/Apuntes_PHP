<?php
    require_once ("models/addModel.php");
    require_once ("models/addRepository.php");
    require_once ("views/listView.phtml");
    
    if(isset($_POST['AddSongToList'])) {
        AddRepository::AddSongToList($_POST['cancion_id'], $_POST['playlist'], $_SESSION['user']->getId());
        
    }
?>