<?php
//-----------------------------------------------------------------------------------//
// Custom wrappers for the Woocommerce loop
//-----------------------------------------------------------------------------------//
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'kwp_woocom_theme_start', 10);
add_action('woocommerce_after_main_content', 'kwp_woocom_theme_end', 10);

function kwp_woocom_theme_start() {
	get_template_part( 'inserts/insert', 'header' );
	get_template_part( 'inserts/insert', 'navigation' );
	get_template_part( 'inserts/insert', 'kwp_content_wrapper_start' );
}

function kwp_woocom_theme_end() {
	get_template_part( 'inserts/insert', 'kwp_content_wrapper_end' );
	get_template_part( 'inserts/insert', 'sidebar' );
	get_template_part( 'inserts/insert', 'footer' );
}


//-----------------------------------------------------------------------------------//
// Disable the default Woocommerce stylesheets
//-----------------------------------------------------------------------------------//
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	//unset( $enqueue_styles['woocommerce-general'] );		// Remove the gloss
	//unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	//unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}


//-----------------------------------------------------------------------------------//
// Remove the default Woocommerce sidebar, insert our own sidebar with the function kwp_woocom_theme_end
//-----------------------------------------------------------------------------------//
add_action( 'wp', 'bbloomer_remove_sidebar_product_pages' );
function bbloomer_remove_sidebar_product_pages() {
	//if (is_product()) {
		remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
	//}
}


//-----------------------------------------------------------------------------------//
// Set the number of Woocommerce products per row
//-----------------------------------------------------------------------------------//
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}


//-----------------------------------------------------------------------------------//
// Change number of related products output
//-----------------------------------------------------------------------------------//
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}


//-----------------------------------------------------------------------------------//
// WooCommerce - Remove product data tabs
//-----------------------------------------------------------------------------------//
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    return $tabs;
}


//-----------------------------------------------------------------------------------//
// Set the number of Woocommerce products per page
//-----------------------------------------------------------------------------------//
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );


//-----------------------------------------------------------------------------------//
// Remove Related Products Output fron single products
//-----------------------------------------------------------------------------------//
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );


//-----------------------------------------------------------------------------------//
// Remove Cross Sells From Cart
//-----------------------------------------------------------------------------------//
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );


//-----------------------------------------------------------------------------------//
// Hide coupon field on cart and/or checkout page/s
//-----------------------------------------------------------------------------------//
// Exclude coupon field on cart
//add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field_on_cart' );
function hide_coupon_field_on_cart( $enabled ) {
	if ( is_cart() ) {
		$enabled = false;
	}
	return $enabled;
}

// Exclude coupon field on checkout
//add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field_on_checkout' );
function hide_coupon_field_on_checkout( $enabled ) {
	if ( is_checkout() ) {
		$enabled = false;
	}
	return $enabled;
}


//-----------------------------------------------------------------------------------//
// Add Cart icon and count to header if WC is active
//-----------------------------------------------------------------------------------//
// Source code for our custom woocommerce cart cart
function kwp_custom_woo_cart_source() {
	$kwp_custom_cart = '';
	if ( WC()->cart->get_cart_contents_count() == 0 ) {
		$kwp_custom_cart .= '<a class="cart-contents" href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'" title="'.__( 'Start shopping' ).'">';
			$kwp_custom_cart .= 'Start shopping';
		$kwp_custom_cart .= '</a>';
	} else {
		$kwp_custom_cart .= '<a class="cart-contents" href="'.wc_get_cart_url().'" title="'.__( 'View your shopping cart' ).'">';
			$kwp_custom_cart .= sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() );
			$kwp_custom_cart .= ' - ';
			$kwp_custom_cart .= WC()->cart->get_cart_total();
		$kwp_custom_cart .= '</a>';
	}
	return $kwp_custom_cart;
}

// Output our custom woocommerce cart cart
add_action( 'kwp_custom_cart', 'kwp_custom_woo_cart_echo' );
function kwp_custom_woo_cart_echo() {

	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		echo '<div id="woo_ajax_cart_info">';
			echo kwp_custom_woo_cart_source();
		echo '</div>';
	}

}

// Update our custom woocommerce cart cart
add_filter( 'woocommerce_add_to_cart_fragments', 'kwp_custom_woo_cart_ajax' );
function kwp_custom_woo_cart_ajax( $fragments ) {

	ob_start();
	echo kwp_custom_woo_cart_source();
	$fragments['a.cart-contents'] = ob_get_clean();
	return $fragments;

}


//-----------------------------------------------------------------------------------//
// Setup a custom products seach form - woo_custom_product_searchform
//-----------------------------------------------------------------------------------//
add_filter( 'get_product_search_form' , 'woo_custom_product_searchform' );
function woo_custom_product_searchform( $form ) {

	$form = '<form role="search_products" method="get" id="search_products" action="' . esc_url( home_url( '/'  ) ) . '">
			<label class="screen-reader-text" for="s">' . __( 'Search for:', 'woocommerce' ) . '</label>
			<input type="search" class="input_search"  value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search for wines ...', 'woocommerce' ) . '" />
			<input type="hidden" name="post_type" value="product" />
			</form>';
	return $form;
}


//-----------------------------------------------------------------------------------//
// Add Event date related information to products in the Event category
//-----------------------------------------------------------------------------------//
add_action( 'woocommerce_single_product_summary', 'kwp_event_date_display', 6 );
add_action( 'woocommerce_after_shop_loop_item_title', 'kwp_event_date_display' );
function kwp_event_date_display() {
	// [postexpirator format="l F jS, Y g:ia" tz="foo"]
	//echo do_shortcode( '[postexpirator format="l F jS, Y g:ia"]' );

	$timestamp_now = time();
    $timestamp_expiry = get_post_meta(get_the_ID(),'_expiration-date',true);

	if (
		!empty($timestamp_expiry) &&
		( $timestamp_expiry > $timestamp_now )
	) { // If this product has an event expiry date

		$date_now = date("Y-m-d",$timestamp_now);
		$date_expiry = date("Y-m-d",$timestamp_expiry);
		$until_event_object = abs(strtotime($date_expiry) - strtotime($date_now));
		$years_until_event = floor($until_event_object / (365*60*60*24));
		$months_until_event = floor(($until_event_object - $years_until_event * 365*60*60*24) / (30*60*60*24));
		$days_until_event = floor(($until_event_object - $years_until_event * 365*60*60*24 - $months_until_event*30*60*60*24)/ (60*60*24));

		echo '<p>';
			//echo 'Now: '.$date_now.' | '.$timestamp_now.'<br/>';
			//echo 'Event date: '.$date_expiry.' | '.$timestamp_expiry.'<br/>';
			echo (date('l F jS, Y g:ia',$timestamp_expiry).'<br/>');
			if ( 1 > $months_until_event ) { echo $days_until_event . " days until this event!"; }
		echo '</p>';
	}

}



add_action( 'woocommerce_archive_description', 'pp_archive' );
function pp_archive() {
		$queried_object = get_queried_object();
		if (is_product_category()) {
			//echo '<pre>' . var_export($queried_object, true) . '</pre>';
		}
}
//-----------------------------------------------------------------------------------//
// Exclude unwanted/niche product categories/types from the main shop homepage
//-----------------------------------------------------------------------------------//
add_action( 'pre_get_posts', 'kwp_manage_woocommerce_archive_queries' );
function kwp_manage_woocommerce_archive_queries( $q ) {

	if ( ! $q->is_main_query() ) return;
	//if ( ! $q->is_post_type_archive() ) return;

	if (
		!is_admin() &&
		( is_shop() || is_product_category( 'events' ) )
	) {

			//echo '<pre>' . var_export($q, true) . '</pre>';

			// Make sure this only fires when we want it too
			if ( $q->get( 'product_cat' ) == 'events') {

				//echo '<pre>' . var_export($q, true) . '</pre>';

				/**/
				$q->set('meta_key', '_expiration-date' );
				$q->set('orderby', 'meta_value'  );
				$q->set( 'order', 'ASC' );
				$meta_query[] = array(
					array(
						'key' => '_expiration-date',
						'value' => time(),
						'compare' => '>=',
					),
				);
				$q->set('meta_query',array( $meta_query ) );
				/**/

			}

		if ( is_shop() ) {
			$q->set( 'tax_query', array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => array( 'events','gift-vouchers','experiences' ), // Don't display products in the knives category on the shop page
					'operator' => 'NOT IN'
				)
			));
		}

	}

	remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

}

?>