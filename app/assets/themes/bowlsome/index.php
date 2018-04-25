<?php
	//
	// Standard WordPress header
	//
	get_header();

	if ( !is_attachment() ) {

		// Include a header
		get_template_part( 'inserts/insert', 'header' );

		// Include a navigation
		//get_template_part( 'inserts/insert', 'navigation' );

	}


	// WORDPRESS BLOGS INDEX PAGE OR CUSTOM BLOGS TEMPLATE
	if ( is_home() ) {
		$template_name = 'home';

	// WORDPRESS STATIC HOMEPAGE OR CUSTOM HOMEPAGE TEMPLATE
	} elseif ( is_front_page() ) {
		$template_name = 'frontpage';

	// SEARCH PAGE
	} elseif ( is_search() ) {
		$template_name = 'search';

	// 404
	} elseif ( is_404() ) {
		$template_name = '404';

	// STANDARD PAGE, PAGE TEMPLATES
	} elseif ( is_page() ) {

		// FULLWIDTH
		if ( is_page_template( 'template-fullwidth.php' ) ) {

		// ENQUIRIES
		} elseif ( is_page_template( 'template_enquiries.php' ) ) {
			$template_name = 'enquiries';
		} elseif ( is_page_template( 'template_menu.php' ) ) {
			$template_name = 'menu';
		// ATTACHMENT POST
		
		// ATTACHMENT POST
		} elseif ( is_attachment() ) {
			$template_name = 'attachment';

		// ALL OTHER PAGES
		} else {
			$template_name = 'page';
		}

	// STANDARD POST AND CUSTOM POST TYPE POST
	} elseif ( is_singular() ) {

		if ( is_single() ) {

			if ( 'XXXXXXX' == get_post_type() ) {
				$template_name = 'post';
			} else {
				$template_name = 'post';
			}

		// NONE OF THE ABOVE SINGULAR POST TYPES
		} else {
			$template_name = 'post';
		}

	// ARCHIVE
	} elseif ( is_archive() ) {

		// CUSTOM POST TYPE ARCHIVE
		if( is_post_type_archive() ) {

			if( is_post_type_archive('XXXXXXX') ) {
				$template_name = 'postlist';
			} else {
				$template_name = 'postlist';
			}

		// CATEGORY ARCHIVE
		} elseif ( is_category() ) {

			if( is_category('XXXXXXX') ) {
				$template_name = 'postlist';
			} else {
				$template_name = 'postlist';
			}

		// TAG ARCHIVE
		} elseif ( is_tag() ) {

			if( is_tag('XXXXXXX') ) {
				$template_name = 'postlist';
			} else {
				$template_name = 'postlist';
			}
		//
		// CUSTOM TAXONOMY ARCHIVE
		//
		} elseif ( is_tax() ) {

			if( is_tax('XXXXXXX') ) {
				$template_name = 'postlist';
			} else {
				$template_name = 'postlist';
			}

		// AUTHOR ARCHIVE
		} elseif ( is_author() ) {
			$template_name = 'postlist';
		// DATE ARCHIVE
		} elseif ( is_date() ) {
			$template_name = 'postlist';
		} else {
			$template_name = 'postlist';
		}

	} else {
		$error = 'We caught the page but don\'t know what to do with it....sorry!';
	}


	// Include content
	if ( have_posts() ) :
		get_template_part( 'inserts/insert', 'kwp_content_wrapper_start' );
		get_template_part( 'inserts/insert', $template_name );
		get_template_part( 'inserts/insert', 'kwp_content_wrapper_end' );
	else :
		echo '<article class="post error">';
			echo '<h2>'.$error.'</h2>';
		echo '</article>';
	endif;


	if ( !is_attachment() ) {

		// Include a sidebar
		if (
			class_exists( 'WooCommerce' ) &&
			!is_cart() && !is_checkout()
		) {
			get_template_part( 'inserts/insert', 'sidebar' );
		} elseif (
			class_exists( 'WooCommerce' ) &&
			( is_cart() || is_checkout() )
		) {
			// Do nothing
		} else {
			//get_template_part( 'inserts/insert', 'sidebar' );
		}
		// Include a footer
		get_template_part( 'inserts/insert', 'footer' );
	}

	get_footer();
?>