<?php
/*
Plugin Name: Google Font Picker Control
Plugin URI:
Description: This plugin creates a new control in the theme customizer to help users pick Google Web Fonts.
Version: 1.1
Author: Patrick Rauland
Author URI: http://www.patrickrauland.com

Copyright (C) 2012 Patrick Rauland

*/

/**
 * Include font classes
**/ 
require_once( 'google-font.php' );
require_once( 'google-font-collection.php' );

/**
 * Include control
 * only load this class when the theme customizer is loaded
**/
add_action( 'customize_register', 'google_font_picker_control_customize_register' );
function google_font_picker_control_customize_register()
{
	require_once( 'control.php' );
}