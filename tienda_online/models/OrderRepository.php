<?php
require_once ("models/OrderModel.php");
    class OrderRepository
    {
        public static function createOrder($id_user){
            $db=Conectar::conexion();
                $q=("INSERT INTO `order` VALUES (NULL, '".$id_user."', NOW(),0, 0)");
                $db->query($q);
        }

        public static function getOrderByUserId($id_user){
            $db=Conectar::conexion();
            $q=("SELECT * FROM `order` WHERE id_user = '".$id_user."' && state='0'");
            $result= $db->query($q);
            if ($row=$result->fetch_assoc()){
                return new OrderModel($row['id'], $row['id_user'], $row['date'], $row['total'], $row['state']);
            }else{
                return false;
            }
        }
    }
?>