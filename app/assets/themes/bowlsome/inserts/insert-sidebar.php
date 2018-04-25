<?php
	if ( is_active_sidebar( 'sidebar-1' ) ) :
		echo '<div id="sidebar" class="primary-sidebar widget-area" role="complementary">';
			dynamic_sidebar( 'sidebar-1' );
		echo '</div>';
	else :
		echo '<div id="sidebar" class="primary-sidebar widget-area" role="complementary">';
			echo '<h3>Default Sidebar is not being used yet. not found.</h3>';
				echo 'The default sidebar is not being used yet. Remove Default Sidebar(sidebar-1) from the theme code if you do not intend on using sidebars and widgets.';
			echo '<p></p>';
		echo '</div>';
	endif;
?>