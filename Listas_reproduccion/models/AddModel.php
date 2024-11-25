<?php

class AddModel{

    private $id_songs;
    private $id_list;
    private $id_user;
    

    function __construct($id_songs, $id_list, $id_user){
        $this->id_songs=$id_songs;
        $this->id_list=$id_list;
        $this->id_user=$id_user;
    }

    public function getIdSongs(){
        return $this->id_songs;
    }

    public function getIdList(){
        return $this->id_list;
    }
    public function getIdUser(){
        return $this->id_user;
    }
}
?>