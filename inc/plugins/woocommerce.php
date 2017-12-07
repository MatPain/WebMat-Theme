<?php

/**
 * Add WooCommerce support
 *
 * @package theme
 */
if ( ! function_exists( 'woocommerce_support' ) ) {
	/**
	 * Declares WooCommerce theme support.
	 */
	function woocommerce_support() {
		add_theme_support( 'woocommerce' );

		// Add New Woocommerce 3.0.0 Product Gallery support
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-zoom' );

		// Gallery slider needs Flexslider - https://woocommerce.com/flexslider/
		add_theme_support( 'wc-product-gallery-slider' );

	}
}
add_action( 'after_setup_theme', 'woocommerce_support' );

// Remove breadcrumbs woocommerce
//remove_action( 'woocommerce_before_main_content' , 'woocommerce_breadcrumb' , 20 );


// TINY MCE IN META BOX for product
function admin_init_hook() {
    function blank(){

    }

    foreach (array('product') as $type) {
        add_meta_box('custom_editor', 'Description longue du produit', 'blank', $type, 'normal', 'high');
    }
}
add_action('admin_init','admin_init_hook');

function admin_footer_hook(){
    global $post;
    if ( get_post_type($post) == 'product') {
	?>
    <script>jQuery('#postdiv, #postdivrich').prependTo('#custom_editor .inside');</script>
    <?php
	}
}
add_action('admin_footer','admin_footer_hook');


// Ensure cart contents update when products are added to the cart via AJAX
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View Cart', 'webmat'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'webmat'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php

	$fragments['a.cart-customlocation'] = ob_get_clean();

	return $fragments;

}
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');


// autocheck terms and conditions
function cwp_wc_terms( $terms_is_checked ) {
  return true;
}
add_filter( 'woocommerce_terms_is_checked_default', 'cwp_wc_terms', 10 );


// Ship to a different address closed by default
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );
