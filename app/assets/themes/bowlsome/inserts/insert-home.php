<?php
	echo '<h1>';
		$page_for_posts = get_option( 'page_for_posts' );
		echo get_the_title($page_for_posts);
	echo '</h1>';

	while ( have_posts() ) : the_post();

		echo '<article class="page">';
			echo '<h2 class="post_title"><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h2>';

			/**/
			echo '<div class="post_meta">';
				post_meta();
			echo "</div>";
			/**/

		    echo '<div class="post_content">';
				// Display the content
				//the_content(); // The full WordPress content - so the single page would not be required.
				//the_excerpt(); // Tha standard WordPress excerpt
				echo my_excerpt(get_the_content(), 50, "Continue Reading »"); // Custom length excerpt
			echo '</div>';

		echo '</article>';
	endwhile;
	echo '<div id="post_pagination" class="row">';
		echo '<div class="columns six past_posts">';
			previous_posts_link( ' &laquo; Browse previous posts' );
			echo "&nbsp;";
		echo '</div>';
		echo '<div class="columns six next_posts">';
			echo "&nbsp;";
			next_posts_link( ' Browse newer posts &raquo;' );
		echo '</div>';
	echo '</div>';
?>