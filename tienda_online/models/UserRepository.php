<?php

class UserRepository
{
    public static function login($username, $password){

        $db = Conectar::conexion();
            $q = "SELECT * FROM users WHERE user = '".$username."'";
            $result = $db->query($q);
            if ($row = $result->fetch_assoc()) {
                if ($row['password'] == $password) {
                    $_SESSION['login'] = true;
                    $_SESSION['user'] =new UserModel($row['id'], $username, $password, $row['rol']);
                } 
            } 
    }

    public static function createUser($username, $password){
        
        $db = Conectar::conexion();
        $q=("INSERT INTO users VALUES (NULL, '".$username."', '".$password."', 1)");
        $db->query($q);
        $q2=("SELECT * FROM users WHERE user = '".$username."'");
        $result = $db->query($q2);
        if ($row = $result->fetch_assoc()) {
            
                $_SESSION['login'] = true;
                $_SESSION['user'] =new UserModel($row['id'], $username, $password, $row['rol']);
            
        } 
    }

    public static function setUserAdmin($username){
        
        $db = Conectar::conexion();
        $db->query("UPDATE users SET rol = 2 WHERE user = '".$username."'");
    }

    // ESTO ESTARÍA BIEN MANDARLO A UN PRODUCT REPOSITORY
    public static function addProduct($name, $description, $image, $price, $stock){
        
        $db = Conectar::conexion();
        $db->query("INSERT INTO products VALUES (NULL, '".$name."', '".$description."', '".$image."', ".$price.", ".$stock.")");
    }

    
}



?>