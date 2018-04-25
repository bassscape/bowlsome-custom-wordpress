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
					the_content();
				echo '</div>';
		
			echo '</div>';
		
		echo '</div>';

	endwhile;
?>