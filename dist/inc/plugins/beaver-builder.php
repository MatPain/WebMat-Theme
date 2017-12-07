<?php

/**
 * For Beaver Builder plugin
 *
 * @since 1.0
 */

// remove auto add jquery if not see jquery, confilt with minification js
remove_action('wp_footer', 'FLBuilder::include_jquery');

function theme_flbuilder_scripts() {
				
	if ( class_exists( 'FLBuilder' ) ) {
		wp_dequeue_style('font-awesome'); /* remove font-awesome from plugin beaver builder */
		wp_deregister_style('font-awesome');	/* remove font-awesome from plugin beaver builder */
	}
	
}
add_action( 'wp_enqueue_scripts', 'theme_flbuilder_scripts' );