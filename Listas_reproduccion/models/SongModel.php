<?php

class SongModel {

    private $id;
    private $title;
    private $author;
    private $duration;
    

    function __construct($id, $title, $author, $duration) {
        $this->id=$id;
        $this->title=$title;
        $this->author=$author;
        $this->duration=$duration;
    }

    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }

    public function getAuthor(){
        return $this->author;
    }
    public function getDuration(){
        return $this->duration;
    }
}
?>