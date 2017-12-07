<?php
/**
 * Check and setup theme's default settings
 *
 * @package theme
 *
 */
function setup_theme_default_settings() {

	// check if settings are set, if not set defaults.
	// Caution: DO NOT check existence using === always check with == .
	// Latest blog posts style.
	$theme_posts_index_style = get_theme_mod( 'theme_posts_index_style' );
	if ( '' == $theme_posts_index_style ) {
		set_theme_mod( 'theme_posts_index_style', 'default' );
	}

	// Sidebar position.
	$theme_sidebar_position = get_theme_mod( 'theme_sidebar_position' );
	if ( '' == $theme_sidebar_position ) {
		set_theme_mod( 'theme_sidebar_position', 'right' );
	}

	// Container width.
	$theme_container_type = get_theme_mod( 'theme_container_type' );
	if ( '' == $theme_container_type ) {
		set_theme_mod( 'theme_container_type', 'container' );
	}
}
