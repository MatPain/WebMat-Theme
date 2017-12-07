<?php
/**
 * theme enqueue scripts
 *
 * @package theme
 */


/*
 * Load Jquery from core Wordpress in footer
 */
function move_jquery_into_footer( $wp_scripts ) {

	if( is_admin() ) { // disable below in back-end
		return;
	}

	wp_dequeue_script('jquery');
	wp_dequeue_script('jquery-core');
	wp_dequeue_script('jquery-migrate');

	wp_enqueue_script('jquery', false, array(), false, true);
	wp_enqueue_script('jquery-core', false, array(), false, true);
	wp_enqueue_script('jquery-migrate', false, array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'move_jquery_into_footer' );


/*
 * Load theme's Styles / Scripts sources.
 */
function theme_scripts() {
	// Get the theme data.
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/assets/css/theme.min.css', array(), $version );

	wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/assets/js/theme.js', array(), $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );
