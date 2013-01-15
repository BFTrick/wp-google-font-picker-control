# Google Font Picker Control

## Description

This WordPress plugin creates a new control type for the [WordPress Theme Customizer](http://codex.wordpress.org/Theme_Customization_API). It will allow you to easily create a fancy looking Google Web Font picker.

## Usage

1. Include & activate the plugin
2. Pick out your favorite [Google Web Fonts](http://www.google.com/webfonts)
3. Open your functions.php file
4. Save your favorite fonts in an array like so: 

	``` php
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
	* **title** - the title you wish the user to see.
	* **location** - the query string on the stylesheet for the google font. If the file name for the font is `http://fonts.googleapis.com/css?family=Ubuntu+Condensed` then the `location` should be `Ubuntu+Condensed`.
	* **cssDeclaration** - the code to be applied to the `font-family` css property. You can keep is the same as Google suggests or you can set up your own fallbacks.
	* **cssClass** - the CSS class for the theme cusomizer. You can create any CSS class you want.

5. Create the control
		
	``` php
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


## Results

![screenshot](http://img.photobucket.com/albums/v357/BFTrick/Web/google-font-picker-custom-tool-for-wordpress_zps76ece86d.png)

## FAQ

1. **Can I only add one font to the $fonts array in step 4?**

	No, you can add as many as you like. IMO eight choices looks pretty and gives the user tons of options.

2. **What's up with the class_exists() functions?**

	Those are there so that if you were to ever deactivate or uninstall the plugin that your site wouldn't crash. If you do uninstall the plugin the control will simply not load. There shouldn't be any errors.