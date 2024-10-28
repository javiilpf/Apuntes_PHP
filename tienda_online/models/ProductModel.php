<?php

class ProductModel{

    private $name;
    private $description;
    private $image;
    private $price;
    private $stock;

    function __construct($name, $description, $image, $price, $stock){
        $this->name= $name;
        $this->description= $description;
        $this->image= $image;
        $this->price= $price;
        $this->stock= $stock;
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