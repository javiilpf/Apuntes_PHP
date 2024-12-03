<?php
class UserModel
{

    private $id_user;
    private $imagen;
    private $correo_electronico; 
    private $username;
    private $password;
    private $rol;
    private $type;


    function __construct($id_user, $imagen, $correo_electronico, $username, $password, $rol, $type)
    {
        $this->id_user = $id_user;
        $this->imagen = $imagen;
        $this->correo_electronico = $correo_electronico;
        $this->username = $username;
        $this->password = $password;
        $this->rol = $rol;
        $this->type = $type;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function get_image()
    {
        return $this->imagen;
    }
    public function getCorreo(){
        return $this->correo_electronico;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRol()
    {
        return $this->rol;
    }
    public function getType()
    {
        return $this->type;
    }
}


?>