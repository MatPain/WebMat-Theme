<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package theme
 */


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function theme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	$classes[] = 'hentry';

	$sidebar_pos = get_theme_mod( 'theme_sidebar_position' );

	if ( is_page_template( 'page-templates/left-sidebarpage.php') or ( ( is_page_template( 'default' ) or !get_page_template_slug( get_the_ID() ) ) and 'left' === $sidebar_pos ) ) {
		$classes[] = 'sd-left';
	} elseif ( is_page_template( 'page-templates/right-sidebarpage.php') or ( ( is_page_template( 'default' ) or !get_page_template_slug( get_the_ID() ) ) and 'right' === $sidebar_pos ) ) {
    	$classes[] = 'sd-right';
	} else {
		$classes[] = 'sd-both';
	}

	return $classes;
}
add_filter( 'body_class', 'theme_body_classes' );


/**
 * Setup body classes.
 *
 * @param string $classes CSS classes.
 * Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
 *
 * @return mixed
 */
function adjust_body_class( $classes ) {

	foreach ( $classes as $key => $value ) {
		if ( 'tag' == $value ) {
			unset( $classes[ $key ] );
		}
	}

	return $classes;

}
add_filter( 'body_class', 'adjust_body_class' );


/**
* Remove hentry from post_class
*/
function isa_remove_hentry_class( $classes ) {
    $classes = array_diff( $classes, array( 'hentry' ) );
    return $classes;
}
add_filter( 'post_class', 'isa_remove_hentry_class' );


/**
 * Replaces logo CSS class.
 *
 * @param string $html Markup.
 *
 * @return mixed
 */
function change_logo_class( $html ) {

	$html = str_replace( 'class="custom-logo"', 'class="img-fluid"', $html );
	$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link p-1 pl-xs-0 pr-xs-0  mr-0"', $html );
	$html = str_replace( 'alt=""', 'title="Home" alt="logo"' , $html );

	return $html;
}
add_filter( 'get_custom_logo', 'change_logo_class' );
