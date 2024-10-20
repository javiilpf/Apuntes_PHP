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
	
	function __construct($datos)
	{
		$this->id=$datos['id'];
		$this->title=$datos['title'];
		$this->year=$datos['year'];
		$this->image=$datos['poster'];
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
}

?>