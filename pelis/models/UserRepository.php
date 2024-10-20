<?php

class UserRepository
{
    public static function login($username, $password){

        $db = Conectar::conexion();
            $q = "SELECT * FROM users WHERE name = '".$username."'";
            $result = $db->query($q);
            if ($row = $result->fetch_assoc()) {
                if ($row['password'] == $password) {
                    $_SESSION['login'] = true;
                } 
            } 
    }
}
    // public static function getUsers(){
    //     $db=Conectar::conexion();
    //     $users= array();
    //     $result= $db->query("SELECT * FROM users");
    //     while($row=$result->fetch_assoc()){
    //         $users[]=new UserModel($row);
    //     }
    //     return $users;
    // }
    
    // public static function addUser($username, $password){
    //     $db=Conectar::conexion();
    //     $db->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
    // }

    // public static function deleteUser($username, $password){
    //     $db=Conectar::conexion();
    //     $db->query("DELETE FROM users WHERE username='$username' AND password='$password'");
    // }



?>