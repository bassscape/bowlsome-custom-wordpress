<?php
	if (
		class_exists( 'WooCommerce' ) &&
		( is_cart() || is_checkout() )
	) {
		echo '<div id="content_full">';
	} else {
		echo '<div id="content" class="post-'.get_the_ID().'">';
	}
?>