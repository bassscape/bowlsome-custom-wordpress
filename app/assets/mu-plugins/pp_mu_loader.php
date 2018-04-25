<?php

	/*
	Plugin Name: PixelPress - Directory Based Plugins Loader
	Description: This is a developers plugin with no user interface. Load/activate/include plugins located within subdirectories of the WordPress mu-plugins directory.
	Version: 1.0.0
	Author: Peter Lugg
	Author URI: http://www.pixelpress.com.au/
	Plugin URI: http://www.pixelpress.com.au/
	*/

	//$path = dirname(__FILE__) . '/XXXXXX/XXXXXX.php'; if (realpath($path)) { include_once($path); $path = NULL; }

	/**/
	$plugins_to_include = array(
		//"XXXXXXXXXXX",
		//"kwp_cmb2_theme_fields",
		"class-tgm-plugin-activation"
	);
	//echo count($plugins_to_include).', ';
	//var_dump_formatted($plugins_to_include);

	$plugin_to_include_row_number = '';

	if($plugins_to_include) {
		foreach($plugins_to_include as $plugin_to_include) {

			if ( $plugin_to_include_row_number == '' ) { $plugin_to_include_row_number = 0; }

			$include_path = dirname(__FILE__) . '/'. $plugins_to_include[$plugin_to_include_row_number] . '/'. $plugins_to_include[$plugin_to_include_row_number].'.php';
			if (realpath($include_path)) { require_once($include_path); $include_path = NULL; }

			$plugin_to_include_row_number++;
		}
	}
	/**/
?>