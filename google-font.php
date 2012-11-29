<?php
/**
 * Google_Font Class
**/
class Google_Font
{
	private $title; // the name of the font
	private $location; // the http location of the font file
	private $cssDeclaration; // the css declaration used to reference the font
	private $cssClass; // the css class used in the theme customizer to preview the font

	/**
	 * Constructor
	**/
	public function __construct($title, $location, $cssDeclaration, $cssClass)
	{
		$this->title = $title;
		$this->location = $location;
		$this->cssDeclaration = $cssDeclaration;
		$this->cssClass = $cssClass;
	}

	/**
	 * Getters
	 * taken from: http://stackoverflow.com/questions/4478661/getter-and-setter
	**/
	public function __get($property) 
	{
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}
} // Custom_Font