<?php
/**
 * Create a Google Maps oEmbed Provider using the Google Maps Embed API
 *
 * @see https://developers.google.com/maps/documentation/embed/
 * @link              https://gist.github.com/soderlind/db6dae8a73253329bc97ac50d7ebedef
 * @since             1.0.0
 * @package           Google_Maps_oEmbed_Provider
 */
class DSS_oEmbed_Add_Provider {

	/**
	 * Refers to a single instance of this class
	 *
	 * @var null
	 */
	private static $instance = null;

	private $goggle_maps_key = 'AIzaSyBTOV7hc3_cJGZJVl-_Ti9nKpbUSY-vkaA'; // <-- replace with your key. Get it from https://developers.google.com/maps/documentation/embed/

	/**
	 * Creates or returns an instance of this class.
	 *
	 * @since 1.0.0
	 * @return object DSS_oEmbed_Add_Provider, a single instance of this class.
	 */
	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	function __construct() {
		add_action( 'init', array( $this, 'oembed_register_handlers' ) );
	}

	/**
	 * Registers The Google Maps oEmbed handlers.
	 * Google Maps does not support oEmbed.
	 *
	 * @see WP_Embed::register_handler()
	 * @see wp_embed_register_handler()
	 *
	 */
	function oembed_register_handlers() {
		wp_embed_register_handler( 'googlemapsv1', '#https?://www.google(\.co|\.com)?(\.[a-z]+)?/maps/place/(.+)#i', array( $this, 'embed_handler_googlemaps' ) );
	}
	/**
	 * The Google Maps embed handler callback. Google Maps does not support oEmbed.
	 *
	 * @see WP_Embed::register_handler()
	 * @see WP_Embed::shortcode()
	 *
	 * @param array $matches The regex matches from the provided regex when calling {@link wp_embed_register_handler()}.
	 * @param array $attr Embed attributes.
	 * @param string $url The original URL that was matched by the regex.
	 * @param array $rawattr The original unmodified attributes.
	 * @return string The embed HTML.
	 */
	function embed_handler_googlemaps( $matches, $attr, $url, $rawattr ) {
		if ( ! empty( $rawattr['width'] ) && ! empty( $rawattr['height'] ) ) {
			$width  = (int) $rawattr['width'];
			$height = (int) $rawattr['height'];
		} else {
			list( $width, $height ) = wp_expand_dimensions( 425, 326, $attr['width'], $attr['height'] );
		}

		if ( count( $matches ) && isset( $matches[3] ) && false !== ( $params = explode( '/', $matches[3] ) ) ) {
			$map_search = $params[0];
			return apply_filters( 'dss_embed_googlemaps', sprintf( "<div class='embed-container'><iframe width='%s' height='%s' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://www.google.com/maps/embed/v1/place?q=%s&key=%s' allowfullscreen></iframe></div>", $width, $height, $map_search, $this->goggle_maps_key ) );
		}
	}
}