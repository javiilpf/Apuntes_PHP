
<?php

class UserModel
{

    private $id;
    private $username;
    private $password;


    function __construct($datos){
        $this->id=$datos['id'];
        $this->username=$datos['username'];
        $this->password=$datos['password'];
    }

    public function getId(){
        return $this->id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

}


?>