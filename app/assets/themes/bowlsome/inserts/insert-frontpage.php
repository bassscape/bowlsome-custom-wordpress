<?php
	while ( have_posts() ) : the_post();

		$carousel_images = get_field('carousel_images', 'option');
		
		if( $carousel_images ):
			
			echo '<div class="owl-carousel owl-theme">';
			
			$slide_counter = 0;
			
			$carousel_first_slide_text = '';
			$carousel_first_slide_text .= get_field('carousel_first_slide_text', 'option');
			if ( '' == $carousel_first_slide_text ) {
				$carousel_first_slide_text .= '<p>At Bowlsome we believe you are what you eat.</p>';
				$carousel_first_slide_text .= '<p>Cliche we know, but in today’s busy world it’s more important than ever to eat mindfully.</p>';
				$carousel_first_slide_text .= '<p>That’s why we’re here to make it easier to find fresh, locally grown food that’s full of flavour! Wholesome goodness served in the simplest of vessels.<br/>';
				$carousel_first_slide_text .= '–<br/>';
				$carousel_first_slide_text .= 'DIVE IN</p>';
			}
			
				foreach( $carousel_images as $image ):
					
					$slide_counter++;
					
					$image_object = wp_get_attachment_image_src( $image['ID'], 'width=600&height=600&crop=1&crop_from_position=center,center');
					
					if ( $slide_counter == 1 ) {
						echo '<div class="valign_text">'.$carousel_first_slide_text.'</div>';
					} elseif ( $slide_counter == 2 ) {
						echo '<div><img id="height_guide_image" src="'.$image_object[0].'" alt="" /></div>';
					} else {
						echo '<div><img src="'.$image_object[0].'" alt="" width="" height="" /></div>';
					}
					
				endforeach;
				
			echo '</div>';
			
		endif;

	endwhile;
?>