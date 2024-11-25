<?php
    require_once("models/SongModel.php");
    require_once("models/SongRepository.php");
    
    if (isset($_POST['añadirCancion'])){
        
        SongRepository::createSong($_POST['title'], $_POST['author'], $_POST['duration']);
        
    }
?>