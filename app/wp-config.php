<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

//echo '<p>HTTP_HOST: '.$_SERVER['HTTP_HOST']. ' | DOCUMENT_ROOT: '.$_SERVER['DOCUMENT_ROOT'].'</p>';

if // Local server based url which requires subdirectories added to the url
	(
		$_SERVER['HTTP_HOST'] == 'localhost' ||
		$_SERVER['HTTP_HOST'] == '127.0.0.1' ||
		stristr( $_SERVER[ 'HTTP_HOST' ], 'localhost' ) ||
		stristr( $_SERVER[ 'HTTP_HOST' ], 'mbp.' ) ||
		stristr( $_SERVER[ 'HTTP_HOST' ], '.loc' )
	)
	{

		define( 'WP_LOCAL', true );

		require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-env.php' );

		if ( !defined('WP_DEBUG') )
			define('WP_DEBUG', true); // Turns WordPress debugging on
		define('WP_DEBUG_LOG', true); // Tells WordPress to log everything to the /wp-content/debug.log file
		define('WP_DEBUG_DISPLAY', true); // Doesn't force the PHP 'display_errors' variable to be on
		@ini_set('display_errors', 1); // 0 hides errors from being displayed on-screen, 1 displays errors on-screen
		@ini_set( 'error_log', '/var/www/html/assets/debug.log' );
		
		if // Local PixelPress server based url which requires subdirectories added to the url
			(
				$_SERVER['HTTP_HOST'] == 'localhost' ||
				$_SERVER['HTTP_HOST'] == '127.0.0.1'
			)
			{
				$parsed_url = parse_url($_SERVER['PHP_SELF']);
				$path_array = explode('/', $parsed_url['path']);
				array_pop($path_array);
				echo join('/', $path_array);
		
				define('WP_SITEURL', 'http://'.$_SERVER['HTTP_HOST'].'/'.$path_array[1].'/cms');
				//define('WP_SITEURL', 'http://'.$_SERVER['HTTP_HOST'].'/'.$path_array[1]);
				define('WP_HOME', 'http://'.$_SERVER['HTTP_HOST'].'/'.$path_array[1]);
		
				define('WP_CONTENT_URL', 'http://'.$_SERVER['HTTP_HOST'].'/'.$path_array[1].'/assets');
			}
		else
			{
				define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/cms');
				//define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
				define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
		
				define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/assets');
				//define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/assets');
			}
		
		define( 'JETPACK_DEV_DEBUG', true);
		
	}
elseif
	(
		$_SERVER['HTTP_HOST'] == '202.58.62.87' ||
		$_SERVER['HTTP_HOST'] == 'dberg.web04.kwp.digital'
	)
	{

		define( 'WP_STAGE', true );

		require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-env.php' );


		define('WP_SITEURL', 'https://' . $_SERVER['HTTP_HOST'] . '/cms');
		define('WP_HOME', 'https://' . $_SERVER['HTTP_HOST']);
		define('WP_CONTENT_URL', 'https://' . $_SERVER['HTTP_HOST'] . '/assets');

		define( 'FORCE_SSL_LOGIN', true );
		define( 'FORCE_SSL_ADMIN', true );

		//
		// Debug and display
		//
		define('WP_DEBUG', true); // true | false
		define('WP_DEBUG_LOG', true);  // true | false . Tells WordPress to log everything to the /wp-content/debug.log file
		define('WP_DEBUG_DISPLAY', true); // true | false
		@ini_set('log_errors','On'); // enable or disable php error logging (use 'On' or 'Off')
		@ini_set('display_errors','On'); // enable or disable public display of errors (use 'On' or 'Off')
		@ini_set( 'error_log', '/home/XXXXXXXXXX/public_html/assets/debug.log' );
		
	}
else // The live website we presume!
	{

		define( 'WP_LIVE', true );

		require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-env.php' );

		define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/cms');
		define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
		define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/assets');

		define( 'FORCE_SSL_LOGIN', false ); // true | false
		define( 'FORCE_SSL_ADMIN', false ); // true | false

		//
		// Debug and display
		//
		define('WP_DEBUG', true); // true | false
		define('WP_DEBUG_LOG', true);  // true | false . Tells WordPress to log everything to the /wp-content/debug.log file
		define('WP_DEBUG_DISPLAY', false); // true | false
		@ini_set('log_errors','On'); // enable or disable php error logging (use 'On' or 'Off')
		@ini_set('display_errors','Off'); // enable or disable public display of errors (use 'On' or 'Off')
		//@ini_set( 'error_log', WP_CONTENT_DIR . '/debug.log' );

	}

define( 'DISALLOW_FILE_EDIT', true ); // disable theme editor and plugin editor
//define( 'DISALLOW_FILE_MODS', true ); // Can cause issued on live servers with editing and role permissons


// ========================
// Set WordPress Memory
// ========================
define('WP_MEMORY_LIMIT', '64M');
define( 'WP_MAX_MEMORY_LIMIT', '64M' );

// ========================
// Custom Content Directory
// ========================
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/assets');
// WP_CONTENT_URL conditionally defined above
define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
define( 'WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins' );
define( 'PLUGINDIR', 'assets/plugins' );

// ========================
// Custom default theme
// ========================
define('WP_DEFAULT_THEME', 'bowlsome');

// ========================
// WordPress salts
// https://api.wordpress.org/secret-key/1.1/salt/
// ========================
define('AUTH_KEY',         '2~cO|mcI|Xm(HQ%~k|v~M#9TJ]@D;E!==>R~N|@!}(yFzQ%^3$&Ri8%8jA, jhKo');
define('SECURE_AUTH_KEY',  'yTpYHvyOGpkE[&ou-V-At0xw%X{i#vOh-_cC_g|#n7Ds{68:b0f,u#Ntx6xYUF#_');
define('LOGGED_IN_KEY',    '+&VGyF3p,o]Jmx_&x0xg(MMH}hnh$.y9&).`e;+IfRwr8n|9:H|+NSr];k$*!l{M');
define('NONCE_KEY',        'uC43vkZTdMf49Pg?@$|*&~.>+]2f0 G4h-hxmS2$AjajCXZ~BBB N`2ua Pw^0lA');
define('AUTH_SALT',        '6&pA0tL25edk^Bt*W`+2Q$h;Bapc+u&:Dr%up`3Qq+n|]v h_g{#ImT^U^`r?hMz');
define('SECURE_AUTH_SALT', 'HvalX+{3-<p|vf;R=R&[a+dNp5X QN{!nPT2iUTl*_`l2c)<X496K#?XDfLORq[S');
define('LOGGED_IN_SALT',   'x)W-<+}!MqR3X (tXg#(ia|bt<sI+j$]Bg9>+uoWmpCRkkSLI;dZN<4onbmciqeG');
define('NONCE_SALT',       '<{ETw+q+|7-R>>,)Y hBr-MGbK+~[%b-uM~?R+_&q0Y8re<I,?SUUZxjwOp|@M`s');


// ========================
// WordPress Database Table prefix.
// ========================
$table_prefix  = 'kwp_';

// ========================
// Disable the WordPress page load cron triggers.
// ========================
define('DISABLE_WP_CRON', false); // true | false
//define('ALTERNATE_WP_CRON', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
