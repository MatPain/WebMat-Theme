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



/**
 * Checks to see if the markup for the post content header
 * should be rendered or not.
 *
 * @since 1.0
 * @return bool
 */
function show_post_header() {
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {

		$global_settings = FLBuilderModel::get_global_settings();

		if ( ! $global_settings->show_default_heading ) {
			return false;
		}
	}

	return true;
}
