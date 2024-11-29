<?php
    require_once ("AddModel.php");
    class AddRepository
    {
        public static function AddSongToList($id_song, $id_list, $id_user){
            $db = Conectar::conexion();
            $q = "INSERT INTO `addSongs` VALUES ('$id_song', '$id_list', '$id_user')";
            $db->query($q);

        } 
        public static function GetSongsForList($id_list, $id_user){
            $db = Conectar::conexion();
            
            $q = "SELECT * FROM addsongs WHERE id_list = $id_list AND id_user = $id_user";
            $result = $db->query($q);
            $añadidos=[];
            while($row = $result->fetch_assoc()){
                $añadidos[]= new AddModel($row['id_songs'], $row['id_list'], $row['id_user']);
            }
            return $añadidos;
            
        }
    }
?>