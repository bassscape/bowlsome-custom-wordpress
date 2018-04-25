<?php
//-----------------------------------------------------------------------------------//
// Setup some basic stuff that is applicable to most WordPress installs
//-----------------------------------------------------------------------------------//
//-----------------------------------------------------//
// Set some constants to reduce database queries
//-----------------------------------------------------//
define( 'HOME_URL', home_url() ); // Use for homepage links
define( 'THEME_URI', get_stylesheet_directory_uri() ); // Use when including files
define( 'SITE_TITLE', get_bloginfo('name') ); // For when you want to use the site title edited under SETTINGS > GENERAL
define( 'SITE_DESCRIPTION', get_bloginfo('description') ); // Used in <title>


//-----------------------------------------------------------------------------------//
// Include/Require custom code
//-----------------------------------------------------------------------------------//
$path = dirname(__FILE__) . '/functions/functions_wordpress_cleanup.php'; // Manipulating the standard WordPress setup
if (realpath($path)) { require_once($path); $path = NULL; }

$path = dirname(__FILE__) . '/functions/functions_wordpress_setup.php'; // Manipulating the standard WordPress setup
if (realpath($path)) { require_once($path); $path = NULL; }

$path = dirname(__FILE__) . '/functions/functions_theme.php'; // Custom theme related code
if (realpath($path)) { require_once($path); $path = NULL; }

if (class_exists( 'WooCommerce' )) {
	$path = dirname(__FILE__) . '/functions/functions_woocommerce.php'; // Manipulating the standard Woocommerce setup
	if (realpath($path)) { require_once($path); $path = NULL; }
}

$path = dirname(__FILE__) . '/functions/functions_gettext.php'; // Manipulating the standard Woocommerce setup
if (realpath($path)) { require_once($path); $path = NULL; }
?>