<?php

class ForoModel{

    private $id_foro;
    private $title;
    private $content;
    private $type;
    

    function __construct($id_foro, $title, $content, $type){
        $this->id_foro=$id_foro;
        $this->title=$title;
        $this->content=$content;
        $this->type=$type;
    }

    public function getIdForo(){
        return $this->id_foro;
    }

    public function getTitle(){
        return $this->title;

    }

    public function getContent(){
        return $this->content;
    }
    public function getType(){
        return $this->type;
    }
}
?>