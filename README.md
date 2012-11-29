# Google Font Picker Control

## Description

This WordPress plugin creates a new control type for the [WordPress Theme Customizer](http://codex.wordpress.org/Theme_Customization_API). It will allow you to easily create a fancy looking Google Web Font picker.

## Usage

1. Include & activate the plugin
2. Pick out your favorite [Google Web Fonts](http://www.google.com/webfonts)
3. Open your function.php file
4. Save your favorite fonts in an array like so: 

		``` ruby
		$customFontFamilies;
		if (class_exists('Google_Font_Collection'))
		{
			$fonts[] = array(
				"title" => "Ubuntu Condensed", 
				"location" => "Ubuntu+Condensed", 
				"cssDeclaration" => "'Ubuntu Condensed', sans-serif", 
				"cssClass" => "ubuntuCondensed"
			);
			$customFontFamilies = new Google_Font_Collection($fonts);
		}
		``` 

5. Create the control
		
	``` ruby
	if (class_exists('Google_Font_Picker_Custom_Control'))
	{ 
		// make sure we have the control included
		$wp_customize->add_control( new Google_Font_Picker_Custom_Control( $wp_customize, 'font_family_control', array(
			'label'				=> __( 'Font Family', 'mytheme' ),
			'section'			=> 'mytheme_new_section_fonts',
			'settings'			=> 'font_family',
			'choices' 			=> $customFontFamilies->getFontFamilyNameArray(),
			'fonts'				=> $customFontFamilies
		)));
	}
	```