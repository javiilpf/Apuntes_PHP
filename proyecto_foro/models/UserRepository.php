<?php

class UserRepository
{
    public static function login($correo_electronico, $password){

        $db = Conectar::conexion();
            $q = "SELECT * FROM user WHERE correo_electronico = '".$correo_electronico."'";
            $result = $db->query($q);
            if ($row = $result->fetch_assoc()) {
                if ($row['password'] == $password) {
                    $_SESSION['login'] = true;
                    $_SESSION['user'] =new UserModel($row['id_user'],$row['imagen'], $correo_electronico,$row['username'], $password, $row['rol'], $row['type']);
                } 
            } 
    }
    public static function getRolForUser($username){
        $db = Conectar::conexion();
        $q = "SELECT rol FROM user WHERE username = '".$username."'";
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return $row['rol'];
        }
    }

    public static function createUser($imagen, $correo, $username, $password){
        
        $db = Conectar::conexion();
        $q=("INSERT INTO user VALUES (NULL, '".$imagen."','".$correo."','".$username."', '".$password."', 1, 1)");
        $db->query($q);
        $q2=("SELECT * FROM user WHERE username = '".$username."'");
        $result = $db->query($q2);
        if ($row = $result->fetch_assoc()) {
            
                $_SESSION['login'] = true;
                $_SESSION['user'] =new UserModel($row['id_user'],$row['imagen'], $correo,$row['username'], $password, $row['rol'], $row['type']);
            
        } 
    }
    public static function closeSession(){
        $_SESSION['login'] = false;
        $_SESSION['user'] = NULL;
    }
}



?>