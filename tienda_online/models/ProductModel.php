<?php

class ProductModel{

    private $id;
    private $name;
    private $description;
    private $image;
    private $price;
    private $stock;

    function __construct($id, $name, $description, $image, $price, $stock){
        $this->id=$id;
        $this->name= $name;
        $this->description= $description;
        $this->image= $image;
        $this->price= $price;
        $this->stock= $stock;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImage(){
        return $this->image;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getStock(){
        return $this->stock;
    }
}

?>