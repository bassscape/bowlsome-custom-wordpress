<?php
	while ( have_posts() ) : the_post();

		echo '<h1>';
			echo get_the_title();
		echo '</h1>';

		echo '<div class="entry">';

			the_content();

		echo '</div>';

	endwhile;
?>