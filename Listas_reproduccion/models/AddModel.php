<?php

class AddModel{

    private $id_songs;
    private $id_list;
    private $id_users;
    

    function __construct($id_songs, $id_list, $id_users){
        $this->id_songs=$id_songs;
        $this->id_list=$id_list;
        $this->id_users=$id_users;
    }

    public function getIdSongs(){
        return $this->id_songs;
    }

    public function getIdList(){
        return $this->id_list;
    }
    public function getIdUsers(){
        return $this->id_users;
    }
}
?>