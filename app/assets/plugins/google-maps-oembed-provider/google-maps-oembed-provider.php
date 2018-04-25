<?php
/**
 * @link              https://gist.github.com/soderlind/db6dae8a73253329bc97ac50d7ebedef
 * @since             1.0.0
 * @package           Google_Maps_oEmbed_Provider
 *
 * @wordpress-plugin
 * Plugin Name:       Google Maps oEmbed Provider
 * Plugin URI:        https://gist.github.com/soderlind/db6dae8a73253329bc97ac50d7ebedef
 * Description:       Create a Google Maps oEmbed Provider using the Google Maps Embed API
 * Version:           1.0.0
 * Author:            Per Soderlind
 * Author URI:        https://soderlind.no
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	 die;
}

include_once( 'class-google-maps-oembed-provider.php' );
/**
 * Instantiates the plugin and and initializes the functionality necessary for
 * WordPress.
 *
 * @since 1.0.0
 */
DSS_oEmbed_Add_Provider::instance();