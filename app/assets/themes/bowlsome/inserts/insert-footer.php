<?php
		echo '</div><!-- END: wrapper_content_sidebar -->';
	echo '</div><!-- END: wrapper_container -->';

	echo '<footer>';

		echo '<div class="wrapper_fullwidth">';
			echo '<div id="footer_left" class="col text_align_center">';
					
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
					
				// FOOTER LEFT
				?>
                <ul class="socialmeida clearfix">  
                                
                    <li class="socialmeida-li">
                        <a title="" href="https://www.instagram.com/bowlsome_au/" class="socialmeida-a" style="opacity: 1; display: inline-block; transform: scaleX(1) scaleY(1); transform-origin: 50% 50% 0px;">
                            <span class="fa fa-instagram"></span> 
                        </a>
                    </li>         
                                
                    <li class="socialmeida-li">
                        <a title="" href="https://www.facebook.com/Bowlsomeau/" class="socialmeida-a" style="opacity: 1; display: inline-block; transform: scaleX(1) scaleY(1); transform-origin: 50% 50% 0px;">
                            <span class="fa fa-facebook"></span> 
                        </a>
                    </li>            
                                    
                    <li class="socialmeida-li">
                        <a title="" href="https://twitter.com/bowlsome_au" class="socialmeida-a" style="opacity: 1; display: inline-block; transform: scaleX(1) scaleY(1); transform-origin: 50% 50% 0px;">
                            <span class="fa fa-twitter"></span> 
                        </a>
                    </li>
                </ul>
				<?php
				// FOOTER LEFT - ROW 01 - WP MENU
	        	/*
				echo '<div class="row_container"><div class="row">';
		            $theme_location = 'footer_links_left';
		            if ( has_nav_menu( $theme_location ) ) {
			            wp_nav_menu(
			                array(
			                    'theme_location' 	=> $theme_location,
			                    'menu_class' 		=> 'menu_footer_links_left menu_piped',
		                        'depth'           	=> 1
			                )
			            );
		            }
	            echo '</div></div>';

	        	// FOOTER LEFT - ROW 02 - COPYRIGHT & WP ADMIN
	        	echo '<div class="row_container"><div class="row">';
					if ( function_exists( 'get_field' ) ) {
						if(
							get_field('would_you_like_to_add_custom_content_to_the_left_footer', 'options') &&
							get_field('footer_left', 'options')
						) {
		            	$footerLeftCustomContent = get_field('footer_left', 'options');
		            	//$footerLeftCustomContentTrim = $footerLeftCustomContent;
		            	$footerLeftCustomContent = trim($footerLeftCustomContent);
						//$footerLeftCustomContentTrim = substr($footerLeftCustomContent,0,-3);
						$footerLeftCustomContentTrim = rtrim($footerLeftCustomContent, '</p>');
						//$footerLeftCustomContentTrim = rtrim($footerLeftCustomContentTrim, '</p> ');
							if ($footerLeftCustomContent) {
								echo "$footerLeftCustomContentTrim";
							} else {
								// Get the date for current copyright
								echo "&copy; ".date("Y").", ".SITE_TITLE.", Some Rights Reserved\n";
							}
						} else {
							echo "&copy; ".date("Y").", ".SITE_TITLE.", Some Rights Reserved\n";
						}
					}
					$adminUrl = get_admin_url();
					$loginUrl = wp_login_url();
					if ( is_user_logged_in() ) {
					   if ( current_user_can( 'edit_pages' ) ) {
						   echo " | <a href=\"$adminUrl\">WP Admin</a>";
					   }
					   echo " | <a href=\"". wp_logout_url( home_url() ) ."\" title=\"Logout\">Logout</a>";

					} else {
						echo " | <a href=\"$loginUrl\">Login</a>";
					}
					echo "</p>";
				echo '</div></div>';
				/**/
		    echo '</div>';

		    //echo '<div id="footer_right" class="col text_align_right">';
		    		// FOOTER RIGHT
		    		//echo '<p>footer_right</p>';
		    		/*
		    		// FOOTER RIGHT - ROW 01 - WP MENU
					echo '<div class="row_container"><div class="row">';
			            $theme_location = 'footer_links_right';
			            if ( has_nav_menu( $theme_location ) ) {
				            wp_nav_menu(
				                array(
				                    'theme_location' 	=> $theme_location,
				                    'menu_class' 		=> 'menu_footer_links_right menu_piped',
			                        'depth'           	=> 1
				                )
				            );
			            }
		           echo '</div></div>';

		            // FOOTER RIGHT - ROW 02 - DEVELOPER LINK & CREDIT
		            echo '<div class="row_container"><div class="row">';;
						if ( function_exists( 'get_field' ) ) {
							if(
								get_field('would_you_like_to_add_custom_content_to_the_right_footer', 'options') &&
								get_field('footer_right', 'options')
							) {
				            	$footerRightCustomContent = get_field('footer_right', 'options');
								$footerRightCustomContentTrim = substr($footerRightCustomContent,0,-5);
								//$footerRightCustomContentTrim = rtrim($footerRightCustomContent, '</p>');
								//$footerRightCustomContentTrim = rtrim($footerRightCustomContentTrim, '</p> ');
								if ($footerRightCustomContent) {
									echo "$footerRightCustomContentTrim | ";
								} else {

								}
							}
						}
						echo "Developed by ";
						echo '<a href="http://kwp.com.au/">KWP!</a>';
						echo ' with ';
						echo '<i class="dashicons dashicons-wordpress"></i>';
						echo "</p>";
					echo '</div></div>';
					/**/
		    //echo '</div>';
	    echo '</div>';

	echo '</footer>';

echo '</div><!-- END: wrapper_page -->';
?>