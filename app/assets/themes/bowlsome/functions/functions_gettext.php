<?php
function woocommerce_rename_coupon_field_on_cart( $translated_text, $text, $text_domain ) {
	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}
	if ( 'Apply Coupon' === $text ) {
		$translated_text = 'Enter gift voucher';

	} elseif ( 'Coupon code' === $text ) {
		$translated_text = '';
	}
	return $translated_text;
}
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_cart', 10, 3 );
?>