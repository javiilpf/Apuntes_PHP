<?php
    class carritoRepository
    {
        public static function addCarrito($idProducto, $idOrder, $precioProducto, $cantidadProducto){
            $db=Conectar::conexion();
                $q=("INSERT INTO line VALUES (NULL, '".$idProducto."', '".$idOrder."','".$precioProducto."', '".$cantidadProducto."')");
                $db->query($q);
        }

        public static function getProductCarrito($id_Order){
            $db=Conectar::conexion();
            $products= array();
            $result= $db->query("SELECT * FROM products where id IN (SELECT id_product FROM line where id_order='".$id_Order."')");
            while($row=$result->fetch_assoc()){
                $products[] = new ProductModel($row['id'],$row['name'],$row['description'], $row['image'], $row['price'], $row['amount']);
                }
            return $products;
        }
        public static function removeProductCarrito($id){
            $db=Conectar::conexion();
            $db->query("DELETE FROM line WHERE id_product ='".$id."'");
        }
    }
?>