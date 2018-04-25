<?php
	echo '<div id="wrapper_navigation">';
		//echo '<div class="wrapper_container">';
			echo '<nav role="navigation">';
			    $theme_location = 'primary_navigation';
			    if ( has_nav_menu( $theme_location ) ) {
					wp_nav_menu(
						array(
						    'theme_location' 	=> $theme_location,
						    'depth'           	=> 1,
							'container'       => false,
							'items_wrap'      => '<ul>%3$s</ul>',
							//'items_wrap'		=>'%3$s',
						    'menu_id' 			=> '',
						    'menu_class' 		=> '',
						)
					);
				}
				echo '<ul id="kwp_custom_cart">';
					echo '<li>';
						kwp_custom_cart();
					echo '</li>';
				echo '</ul>';
			echo '</nav>';
		//echo '</div>';
	echo '</div>';
?>