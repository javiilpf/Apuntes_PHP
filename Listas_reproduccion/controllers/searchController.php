<?php
    require_once("models/SongModel.php");
    require_once("models/SongRepository.php");
    
    if(isset($_POST['buscarSong'])){
        $songs = SongRepository::getSong($_POST['search']);
    }

?>