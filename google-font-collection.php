<?php
/**
 * Google Font_Collection Class
**/
// this file controls all of the data for the custom fonts used in the theme customizer

// the Google_Font_Collection object is a wrapper that holds all of the individual custom fonts
class Google_Font_Collection
{
	private $fonts;

	/**
	 * Constructor
	**/
	public function __construct($fonts)
	{
		if(empty($fonts))
		{
			//we didn't get the required data
			return false;
		}

		// create fonts
		foreach ($fonts as $key => $value) 
		{
			$this->fonts[] = new Google_Font($value["title"], $value["location"], $value["cssDeclaration"], $value["cssClass"]);
		}
	}

	/**
	 * getFontFamilyNameArray Function
	 * this function returns an array containing all of the font family names
	**/
	function getFontFamilyNameArray()
	{
		$result;
		foreach ($this->fonts as $key => $value) 
		{
			$result[] = $value->__get("title");
		}
		return $result;
	}

	/**
	 * Custom Font Class
	 * this function returns the font title
	**/
	function getTitle($key)
	{
		return $this->fonts[$key]->__get("title");
	}

	/**
	 * Custom Font Class
	 * this function returns the font location
	**/
	function getLocation($key)
	{
		return $this->fonts[$key]->__get("location");
	}

	/**
	 * Custom Font Class
	 * this function returns the font css declaration
	**/
	function getCssDeclaration($key)
	{
		return $this->fonts[$key]->__get("cssDeclaration");
	}

	/**
	 * Custom Font Class
	 * this function returns the font css class
	**/
	function getCssClass($key)
	{
		return $this->fonts[$key]->__get("cssClass");
	}

	/**
	 * Custom Font Class
	 * this function returns the total number of fonts
	**/
	function getTotalNumberOfFonts()
	{
		return count($this->fonts);
	}

	/**
	 * Custom Font Class
	 * this function prints the links to the css files for the theme customizer
	**/
	function printThemeCustomizerCssLocations()
	{
		foreach ($this->fonts as $key => $value) 
		{
			?>
			<link href="http://fonts.googleapis.com/css?family=<?= $value->__get("location"); ?>" rel='stylesheet' type='text/css'>
			<?php
		}
	}

	/**
	 * Custom Font Class
	 * this function prints the theme customizer css classes necessary to display all of the fonts
	**/
	function printThemeCustomizerCssClasses()
	{
		?>
		<style type="text/css">
			<?php
			foreach ($this->fonts as $key => $value) 
			{
				?>
				.<?=$value->__get("cssClass")?>{
					font-family: <?= $value->__get("cssDeclaration"); ?>;
				}
				<?php
			}
			?>
		</style>
		<?php 
	}

} // Font_Collection