<?php
    class CarritoModel
    {
        private $id;
        private $id_product;
        private $id_order;
        private $precio;
        private $cantidad;

        public function __construct($id, $id_product, $id_order, $precio, $cantidad){
            $this->id = $id;
            $this->id_product = $id_product;
            $this->id_order = $id_order;
            $this->precio = $precio;
            $this->cantidad = $cantidad;
        }
        
        public function getId(){
            return $this->id;
        }

        public function getIdProduct(){
            return $this->id_product;
        }

        public function getIdOrder(){
            return $this->id_order;
        }
        
        public function getPrecio(){
            return $this->precio;
        }

        public function getCantidad(){
            return $this->cantidad;
        }
    }
?>