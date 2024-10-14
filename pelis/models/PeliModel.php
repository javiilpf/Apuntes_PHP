<?php

/**
 * 
 */
class PeliModel 
{
	private $id;
	private $title;
	private $year;
	private $image;
	private $like;
	
	
	function __construct($datos)
	{
		$this->id=$datos['id'];
		$this->title=$datos['Título'];
		$this->year=$datos['Año'];
		$this->image=$datos['Póster'];
		$this->like=$datos['Likes'];
		
		# code...
	}

	public function getId(){
		return $this->id;
	}
	public function getTitle(){
		return $this->title;
	}
	public function getYear(){
		return $this->year;
	}
	public function getImage(){
		return $this->image;
	}
	public function getLike(){
		return $this->like;
	}
}

?>