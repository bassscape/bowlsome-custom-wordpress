<?php
//-----------------------------------------------------//
// Setup hooks for adding custom code to our theme
//-----------------------------------------------------//
//Head
function kwp_styles() { do_action('kwp_styles'); } // Triggered in the html head after wp_head()
function kwp_scripts_header() { do_action('kwp_scripts_header'); } // Triggered in the html head after wp_head() & kwp_styles()
//Foot
function kwp_scripts_footer() { do_action('kwp_scripts_footer'); } // Triggered before the closing body tag after wp_footer()
//Custom locations
function kwp_custom_cart() { do_action('kwp_custom_cart'); } // Triggered before the closing body tag after wp_footer()


//-----------------------------------------------------------------------------------//
// ADD FAVICONS
//-----------------------------------------------------------------------------------//

add_action('wp_head', 'favicons');
function favicons() {
	$favicon_dir_url = THEME_URI.'/images/favicon/';
	?>
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $favicon_dir_url; ?>apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $favicon_dir_url; ?>apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $favicon_dir_url; ?>apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $favicon_dir_url; ?>apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo $favicon_dir_url; ?>apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo $favicon_dir_url; ?>apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo $favicon_dir_url; ?>apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $favicon_dir_url; ?>apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?php echo $favicon_dir_url; ?>favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="<?php echo $favicon_dir_url; ?>favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="<?php echo $favicon_dir_url; ?>favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php echo $favicon_dir_url; ?>favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="<?php echo $favicon_dir_url; ?>favicon-128.png" sizes="128x128" />
	<?php

}


//-----------------------------------------------------------------------------------//
// GET POST META
//-----------------------------------------------------------------------------------//
function post_meta() {
	echo '[ ';
	// Date
	echo 'Published on ';
	the_time('F j, Y \a\t g:i a');

	// Author
	//echo "by ";
	//the_author(); // Author name with NO link
	//the_author_posts_link(); // Author name WITH link

	// Categories
	$categories = get_the_category();
	$separator = ', ';
	$output = '';
	if($categories){
		foreach($categories as $category) {
			$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
		}
		echo ' | Filed under: ';
		echo trim($output, $separator);
	}

	// Tags
	echo get_the_tag_list( ' | Tagged with: ', ', ', '' );
	echo ' ]';

	//echo "<br/>"; // New line
	// Comments
	//if( comments_open() ) : // Use this statement if you only want comments links displayed when comments are open.
		//echo "[ ";
			//comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are closed for this post');
		//echo " ]";
	//endif;
}

//-----------------------------------------------------------------------------------//
// CUSTOM EXCERPTS
//-----------------------------------------------------------------------------------//
function my_excerpt($excerpt = '', $excerpt_length = 50, $readmore = "Read more »", $tags = '') {
	global $post;
	$string_check = explode(' ', $excerpt);
	if (count($string_check, COUNT_RECURSIVE) > $excerpt_length) {
		$new_excerpt_words = explode(' ', $excerpt, $excerpt_length+1);
		array_pop($new_excerpt_words);
		$excerpt_text = implode(' ', $new_excerpt_words);
		$temp_content = strip_tags($excerpt_text, $tags);
		$short_content = preg_replace('`\[[^\]]*\]`','',$temp_content);
		$short_content .= ' ... <a href="'.get_permalink().'">'. $readmore . '</a>';
		return $short_content;
	} else {
		return $excerpt;
	}
}


//-----------------------------------------------------------------------------------//
// Format filesizes
// https://stackoverflow.com/questions/5501427/php-filesize-mb-kb-conversion
//-----------------------------------------------------------------------------------//
function formatSizeUnits($bytes) {
	if ($bytes >= 1073741824) {
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	} elseif ($bytes >= 1048576) {
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	} elseif ($bytes >= 1024) {
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	} elseif ($bytes > 1) {
		$bytes = $bytes . ' bytes';
	} elseif ($bytes == 1) {
		$bytes = $bytes . ' byte';
	} else {
		$bytes = '0 bytes';
	}
	return $bytes;
}

?>