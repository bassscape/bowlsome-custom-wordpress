<?php
//-----------------------------------------------------//
// Add various WordPress support to our theme
//-----------------------------------------------------//
add_theme_support( 'post-thumbnails' );
add_theme_support( 'nav-menus' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'woocommerce' );


//-----------------------------------------------------//
// Enqueue css
//-----------------------------------------------------//
add_action('wp_enqueue_scripts', 'kwp_childtheme_css_enqueue'); // Enqueue styles with wp_enqueue_scripts so they are added after plugin styles etc ...
function kwp_childtheme_css_enqueue() {

	$theme = wp_get_theme(); // Get the current theme info for version numbers

	// Register main stylesheet
	wp_register_style( 'css_style', THEME_URI . '/style.css', array(), $theme['Version'], 'all' );

    // Enqueue stylesheets
	wp_enqueue_style( 'css_style' );
	wp_enqueue_style( 'dashicons' );
}

//-----------------------------------------------------//
// Enqueue scripts and add localized content
//-----------------------------------------------------//
add_action( 'wp_enqueue_scripts', 'kwp_custom_scripts_enqueue' );
function kwp_custom_scripts_enqueue() {

	$theme = wp_get_theme(); // Get the current theme info for version numbers

	// Register custom scripts
	wp_register_script( 'js_main', THEME_URI . '/scripts/js_min.js', array( 'jquery' ), $theme['Version'], true); // Register a script with depenancies and version in the footer

	// Enqueue scripts
	wp_enqueue_script('js_main');

	// Localize scripts
	$localize_var_args = array(
		'site_title' => SITE_TITLE,
		//'home_url' => HOME_URL,
		//'theme_url' => THEME_URI,
		'ajaxurl' => admin_url( 'admin-ajax.php' )
	);
	wp_localize_script( 'js_main', 'wp_js_vars', $localize_var_args );

}


//-----------------------------------------------------//
// WordPress navigation menus & associated code, walkers
//-----------------------------------------------------//
// Add a navigation menu
if ( function_exists('wp_nav_menu') ) {
	add_theme_support( 'nav-menus' );
	register_nav_menus( array(
		'primary_navigation'		=> __( 'Main Nav', 'kwp_custom' ),
	) );
}


//-----------------------------------------------------//
// Setup a sidebar .......... and make sure it is (before_widget & after_widget) Woocommerce compatible
//-----------------------------------------------------//
add_action('widgets_init', 'kwp_widgets_init');
function kwp_widgets_init() {
    register_sidebar(array(
        'name' => __('Default Sidebar', 'kwp_custom'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}


//-----------------------------------------------------------------------------------//
// Setup a custom products seach form - woo_custom_product_searchform
//-----------------------------------------------------------------------------------//
add_filter( 'get_search_form' , 'woo_custom_searchform' );
function woo_custom_searchform( $form ) {

	$form = '<form role="search" method="get" id="search_form" class="search_form" action="' . home_url( '/' ) . '" >
			<label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
			<input type="search" class="input_search"  value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search our site ...', 'woocommerce' ) . '" />
			</form>';
	return $form;

}


//-----------------------------------------------------------------------------------//
// ADD SVG TO WORDPRESS
//-----------------------------------------------------------------------------------//
add_action('upload_mimes', 'add_file_types_to_uploads');
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}

?>