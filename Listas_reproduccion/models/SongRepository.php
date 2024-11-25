<?php
require_once ("SongModel.php");
class SongRepository
{
    public static function createSong($title, $author, $duration){
        $db=Conectar::conexion();
        $q=("INSERT INTO `songs` VALUES (NULL, '".$title."','".$author."', '".$duration."')");
        $db->query($q);
    }

    public static function getSong($elementSearch){
        $db=Conectar::conexion();
        $q=("SELECT * FROM `songs` WHERE title = '$elementSearch' OR author = '$elementSearch'");
        $result=$db->query($q);
        while($row=$result->fetch_assoc()){
            $songs[] = new SongModel($row['id'],$row['title'],$row['author'], $row['duration']);
        }
        return $songs;
    }
}