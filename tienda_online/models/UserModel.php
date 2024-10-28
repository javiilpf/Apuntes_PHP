
<?php

class UserModel
{

    private $id;
    private $username;
    private $password;
    private $rol;


    function __construct($id, $username, $password, $rol){
        $this->id=$id;
        $this->username= $username;
        $this->password=$password;
        $this->rol=$rol;
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

    public function getRol(){
        return $this->rol;
    }	

}


?>