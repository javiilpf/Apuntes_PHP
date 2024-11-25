<?php

class ListModel{

    private $id;
    private $id_user;
    private $title;
    

    function __construct($id, $id_user, $title){
        $this->id=$id;
        $this->id_user=$id_user;
        $this->title=$title;
    }

    public function getId(){
        return $this->id;
    }
    public function getIdUser(){
        return $this->id_user;
    }

    public function getTitle(){
        return $this->title;
    }
}
?>