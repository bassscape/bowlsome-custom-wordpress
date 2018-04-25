<!DOCTYPE HTML>
<?php
echo '<html lang=en>';
	echo '<head>';

		echo '<meta http-equiv="Content-Type" content="'.get_bloginfo('html_type').'" charset="'.get_bloginfo('charset').'" />';

		echo '<title>';
				if ( defined('WPSEO_URL') ) {
					echo wp_title( '|', false, 'right' ) . ' | '. SITE_DESCRIPTION;
				} else {
				    echo SITE_TITLE . ' | ' . SITE_DESCRIPTION;
				}
		echo '</title>';

		echo '<link rel="alternate" type="application/rss+xml" title="'.get_bloginfo('name').' RSS Feed" href="'.get_bloginfo('rss2_url').'" />';

		wp_head();
		kwp_scripts_header();
		kwp_styles();

	echo '</head>';

$body_classes_array = get_body_class(); // Get the classes WordPress adds to the body tag
$body_classes_string = implode(" ",$body_classes_array);
echo '<body id="scroll_to_top" class="'.$body_classes_string.'">';

	echo '<!--[if lt IE 8]>Did you know that your web browser is a bit old? Some of the content on this site might not work right as a result. <a href="http://whatbrowser.org">Upgrade your browser</a> for a faster, better, and safer web experience.<![endif]-->';
?>