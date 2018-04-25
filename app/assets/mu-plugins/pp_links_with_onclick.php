<?php
/*
Plugin Name: PixelPress - Visual Editor Links with onClick attributes
Description: Plugin for adding Links with onClick attributes within the WordPress Visual Editor.
Version: 1.0.0
Author: Peter Lugg
Author URI: http://pixelpress.com.au
*/

//
// Create a shortcode which will allow onclick sttributes on links - mainly useful for Google Analytics tracking code
//
// See source article here: https://digwp.com/2009/09/easy-shortcode-permalinks/
// example usage:
// [create_link link_url="http://www.kwp.com.au/" onclick_input="ga('send', 'event', { eventCategory: 'Home_Page', eventAction: 'Click', eventLabel: 'Main_Banner_CTA'} );" link_text="Link to KWP!"]

add_shortcode('create_link', 'shortcoded_links');
function shortcoded_links($atts) {

	extract(shortcode_atts(array(
		'link_url' => '',
		'onclick_input' => '',
		'link_text' => ''  // default value if none supplied
    ), $atts));

    if (
    	'' == $link_url ||
    	'' == $link_text
    ) {
        return false;
    } else {
	    $onclick_att = '';
	    if ( '' != $onclick_input ) { $onclick_att = ' onClick="'.$onclick_input.'"'; }
	   return '<a href="'.$link_url.'"'.$onclick_att.'>'.$link_text.'</a>';
	}

}
?>