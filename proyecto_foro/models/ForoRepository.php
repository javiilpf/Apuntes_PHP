<?php
require_once ("ForoModel.php");
class ForoRepository
    {
        public static function getPublicPrivateForos(){
            $db=Conectar::conexion();
            $q=("SELECT * FROM `foro`");
            $result=$db->query($q);
            while($row=$result->fetch_assoc()){
                $entradas[] = new ForoModel($row['id_foro'],$row['title'],$row['content'], $row['type']);
            }
            return $entradas;
        }
        public static function getPublicForos(){
            $db=Conectar::conexion();
            $q=("SELECT * FROM `foro` where `type` ='1'");
            $result=$db->query($q);
            while($row=$result->fetch_assoc()){
                $entradas[] = new ForoModel($row['id_foro'],$row['title'],$row['content'], $row['type']);
            }
            return $entradas;
        }
    }