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

    public static function getSongById($idSong) {
        // Verificamos que $idSong no sea un array
        if (is_array($idSong)) {
            throw new InvalidArgumentException("El ID de la canción no puede ser un array.");
        }
    
        $db = Conectar::conexion();
        $q = "SELECT * FROM songs WHERE id = '".$db->real_escape_string($idSong)."'";
        $result = $db->query($q);
        
        if ($row = $result->fetch_assoc()) {
            return new SongModel($row['id'], $row['title'], $row['author'], $row['duration']);
        }
        
        return null; // Devuelve null si no se encuentra la canción
    }
    
    public static function convertMillisToMinutesAndSeconds($milliseconds) {
        $totalSeconds = $milliseconds / 1000;
        $minutes = floor($totalSeconds / 60);
        $seconds = $totalSeconds % 60;
    
        // Formatear los segundos para que siempre muestren dos dígitos
        $seconds = sprintf('%02d', $seconds);
    
        return $minutes . ":" . $seconds;
    }
    
    
}