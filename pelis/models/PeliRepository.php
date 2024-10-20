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
		$result= $db->query("SELECT * FROM películas");
		while($row=$result->fetch_assoc()){
				$movies[]=new PeliModel($row);
			}
		return $movies;
	}

	public static function getMovieByTitle($t){
		$db=Conectar::conexion();
		$movies= array();
		$result= $db->query("SELECT * FROM películas WHERE title LIKE '%".$t."%'");
		while($row=$result->fetch_assoc()){
				$movies[]=new PeliModel($row);
			}
		return $movies;
	}

	public static function deleteMovies($id){
		$db=Conectar::conexion();
        $db->query("DELETE FROM películas WHERE id= $id");
	}

	public static function addMovie($title, $year, $image, $likes){
        $db=Conectar::conexion();
        $db->query("INSERT INTO películas VALUES (null,'$title', $year, '$image',$likes)");
    }

	
}


?>