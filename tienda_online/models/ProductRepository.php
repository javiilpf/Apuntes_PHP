<?php
require_once ("ProductModel.php");
class productRepository
{
    public static function showProducts(){

        $db = Conectar::conexion();
            $q = "SELECT * FROM products";
            $result = $db->query($q);
            while($row = $result->fetch_assoc()){
                $products[] = new ProductModel($row['id'],$row['name'],$row['description'], $row['image'], $row['price'], $row['amount']);
            }
            return $products;
            

    } 

    
    
}




?>