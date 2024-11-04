<?php
    class OrderModel
    {
        private $id;
        private $id_user;
        private $date;
        private $total;
        private $state;

        function __construct($id, $id_user, $date, $total, $state)
        {
            $this -> id = $id;
            $this -> id_user = $id_user;
            $this -> date = $date;
            $this -> total = $total;
            $this -> state = $state;
        }
        
        public function getId(){
            return $this -> id;
        }
        
        public function getIdUser(){
            return $this -> id_user;
        }
        
        public function getDate(){
            return $this -> date;
        }
        
        public function getTotal(){
            return $this -> total;
        }
        
        public function getState(){
            return $this -> state;
        }
    }
?>