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
    public static function addProduct($name, $description, $image, $price, $stock){
        
        $db = Conectar::conexion();
        $db->query("INSERT INTO products VALUES (NULL, '".$name."', '".$description."', '".$image."', ".$price.", ".$stock.")");
    }
}



?>