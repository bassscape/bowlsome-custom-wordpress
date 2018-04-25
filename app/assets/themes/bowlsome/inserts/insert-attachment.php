<?php
	while ( have_posts() ) : the_post();
		echo '<div id="wrapper_attachment">';
			echo '<div class="attachment_vert_centered">';
				echo '<h1>'.get_the_title().'</h1>';
				echo wp_get_attachment_image( get_the_ID(), 'large' );
				echo '<p>'.get_the_excerpt().'</p>';
				echo '<button onclick="goBack()">Go Back</button>';
				echo '<script>function goBack() { window.history.back(); }</script>';
			echo '</div>';
		echo '</div>';
	endwhile;
?>