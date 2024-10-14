<?php

/**
 * 
 */
class PeliRepository
{
	//metodo para sacar todas las peliculas
	public static function getMovies(){
		$db=Conectar::conexion();
		$movies= array();
		$result= $db->query("SELECT * FROM pelis");
		while($row=$result->fetch_assoc()){
				$movies[]=new PeliModel($row);
			}
		return $movies;
	}

	public static function getMovieByTitle($t){
		$db=Conectar::conexion();
		$movies= array();
		$result= $db->query("SELECT * FROM pelis WHERE Título LIKE '%".$t."%'");
		while($row=$result->fetch_assoc()){
				$movies[]=new PeliModel($row);
			}
		return $movies;
	}

public static function like($likes){
	$db=Conectar::conexion();
    $db->query("UPDATE pelis SET likes='$likes' WHERE id='".$_POST['id']."'");
}

public static function borrarPelis($id){
	$db=Conectar::conexion();
    $db->query("DELETE FROM pelis WHERE id='$id'");
}

public static function añadirPelis($title, $year, $image, $likes){
	$db=Conectar::conexion();
    $db->query("INSERT INTO pelis VALUES (NULL, '$title', '$year', '$image', '$likes')");

}
}
?>