<?php
    class Conectar{
        public static function conexion(){
            $conexion=new mysqli("localhost", "root", "", "proyecto_foro");
            $conexion->query("SET NAMES 'utf8'");
            return $conexion;
        }
    }
?>