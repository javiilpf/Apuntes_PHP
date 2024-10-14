<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "root", "", "pelis");
        //$conexion->query("SET Título 'utf8'");
        return $conexion;
    }
}
?>