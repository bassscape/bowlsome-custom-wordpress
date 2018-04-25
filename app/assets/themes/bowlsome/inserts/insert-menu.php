<?php
	while ( have_posts() ) : the_post();
		
		echo '<header class="page_title_header">';
			echo '<div class="overlay_gradient_white_left">';
				echo '<h1>';
					echo get_the_title();
				echo '</h1>';
			echo '</div>';
		echo '</header>';
				
		echo '<div id="page_grid">';
		
			echo '<div class="col">';
		
				echo '<div class="entry">';
					
					//
					// Build nutritional_fact information if is exists
					//
					$nutritional_facts_upload = '';
					$file = get_field('nutritional_facts_upload', 'option');
					if ($file) {
						
						$file_url = wp_get_attachment_url( $file );
						$file_size = filesize( get_attached_file( $file ) );
						$file_size_human_readable = formatSizeUnits($file_size);
						$file_type = get_post_mime_type( $file );
						
						$nutritional_facts_upload .= '<p style="text-align: center;">';
							$nutritional_facts_upload .= '<a href="'.$file_url.'" target="_blank" rel="noopener">';
								$nutritional_facts_upload .= 'DOWNLOAD OUR NUTRITIONAL INFORMATION';
							$nutritional_facts_upload .= '</a>';
							$nutritional_facts_upload .= '<br />';
							$nutritional_facts_upload .= '[File Type: '.$file_type.' | File Size: '.$file_size_human_readable.']';
						$nutritional_facts_upload .= '</p>';
						
					}
					$file = null;
					
					//
					// Build menu information if is exists
					//
					$menu_upload = '';
					$file = get_field('menu_upload', 'option');
					if ($file) {
						
						$file_url = wp_get_attachment_url( $file );
						
						$menu_upload .= '<hr />';
							$menu_upload .= '<p>';
								$menu_upload .= '<img class="alignnone" src="'.$file_url.'" alt="" />';
							$menu_upload .= '</p>';
						$menu_upload .= '<hr />';
						
					}
					$file = null;
					
					
					//
					// Display the content we created
					//
					echo $nutritional_facts_upload.$menu_upload.$nutritional_facts_upload;
					
					
				echo '</div>';
		
			echo '</div>';
		
		echo '</div>';

	endwhile;
?>