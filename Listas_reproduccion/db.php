<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "root", "", "listas_de_reproduccion");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}

?>