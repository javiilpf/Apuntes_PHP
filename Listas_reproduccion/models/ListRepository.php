<?php
require_once ("ListModel.php");
class ListRepository
{
    public static function showListforUser($user){
        $db = Conectar::conexion();
        $q = "SELECT * FROM lists where id_user='".$user->getId()."'";
        $result = $db->query($q);
        while($row = $result->fetch_assoc()){
            
            $lists[] = new ListModel($row['id'], $row['id_user'], $row['title']);
            
        }
        
        if (!empty($lists)){
            return $lists;
        }
    } 

    public static function createListForUser($idUser, $title){
        $db=Conectar::conexion();
        $q=("INSERT INTO `lists` VALUES (NULL, '".$idUser."', '".$title."')");
        $db->query($q);
    }

    public static function getTitleOfListById($idList){
        $db=Conectar::conexion();
        $q=("SELECT title FROM `lists` WHERE id = '$idList'");
        $result=$db->query($q);
        $row=$result->fetch_assoc();
        
        return $row['title'];
    }
    
}