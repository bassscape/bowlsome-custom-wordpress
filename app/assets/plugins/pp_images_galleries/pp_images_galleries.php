<?php
/**
 * Plugin Name: PP - Improve default WordPress images and galleries
 * Plugin URI: http://kwp.com.au
 * Description: This plugin developed to improve default WordPress images and galleries by adding some basic styles and using lightGallery[http://sachinchoolur.github.io/lightGallery/].
 * Version: 0.1
 * Author: KWP!
 * Author URI: http://kwp.com.au
 * License: GPLv2
 */


//-----------------------------------------------------//
// Enqueue css
//-----------------------------------------------------//
add_action( 'wp_enqueue_scripts', 'kwp_image_and_gallery_styles' );
function kwp_image_and_gallery_styles() {

	if( !is_admin() ) {

		if ( function_exists( 'is_woocommerce' ) ) {
			//dequeue scripts and styles
			if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {

				$theme = wp_get_theme(); // Get the current theme info for version numbers

				wp_register_style( 'kwp_css_images_galleries', plugins_url( 'kwp_images_galleries.css', __FILE__ ) );
				wp_enqueue_style( 'kwp_css_images_galleries' );

				wp_register_style( 'kwp_css_lightgallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.9/css/lightgallery.min.css', array(), $theme['Version'], 'all' ); // Lightbox for improved WordPress images and galleries
				wp_enqueue_style( 'kwp_css_lightgallery' );

			}
		}
	}


}
//-----------------------------------------------------//
// Enqueue scripts and add localized content
//-----------------------------------------------------//
add_action( 'wp_enqueue_scripts', 'kwp_image_and_gallery_scripts' );
function kwp_image_and_gallery_scripts() {

	if( !is_admin() ) {

		if ( function_exists( 'is_woocommerce' ) ) {
			//dequeue scripts and styles
			if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {

				$theme = wp_get_theme(); // Get the current theme info for version numbers

				wp_register_script( 'kwp_js_images_galleries', plugins_url( 'kwp_images_galleries.js', __FILE__ ), array( 'jquery' ), '', true );
				wp_enqueue_script('kwp_js_images_galleries');

				wp_register_script( 'kwp_js_lightgallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.9/js/lightgallery.min.js', array( 'jquery' ), $theme['Version'], true); // Lightbox for improved WordPress images and galleries
				wp_enqueue_script('kwp_js_lightgallery');

			}
		}
	}

}


//-----------------------------------------------------//
// Do all our stuff if we are not viewing the WordPress admin
//-----------------------------------------------------//
if( !is_admin() ) {

	if ( function_exists( 'is_woocommerce' ) ) {
		//dequeue scripts and styles
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {

			//-----------------------------------------------------//
			// Remove default WordPress gallery styles
			//-----------------------------------------------------//
			add_filter( 'use_default_gallery_style', '__return_false' );

			//-----------------------------------------------------//
			// Remove the width and height attributes from images inserted into wysiwygs
			//-----------------------------------------------------//
			add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
			add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
			function remove_thumbnail_dimensions( $html ) { $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html ); return $html; }

			//-----------------------------------------------------//
			// Wrap oEmbeds in a div with class for responsive styles
			//-----------------------------------------------------//
			add_filter('embed_oembed_html', 'kwp_embed_oembed_html', 99, 4);
			function kwp_embed_oembed_html($html, $url, $attr, $post_id) {
				return '<div class="embed-container">'.$html.'</div>';
			}

			//-----------------------------------------------------//
			// Add a custom rel attribute to images inserted into the_content
			//-----------------------------------------------------//
			add_filter('the_content', 'kwp_image_filter');
			function kwp_image_filter($content) {
			       global $post;
			       $pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)><img(.*?)alt=('|\")(.*?)('|\")(.*?)><\/a>/";
			       $replacement = '<a$1href=$2$3.$4$5 rel="kwp_lightbox" alt="$9" title="$9"$6><img$7 alt="$9" $11></a>';
			       $content = preg_replace($pattern, $replacement, $content);
			       return $content;
			}
		}
	}
}

?>