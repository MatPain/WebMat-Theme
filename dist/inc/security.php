<?php
/**
 * Inspired by Simon Bradburys cleanup.php fromb4st theme https://github.com/SimonPadbury/b4st
 *
 * @package theme
 */

/**
 * Removes the generator tag with WP version numbers. Hackers will use this to find weak and old WP installs
 *
 * @return string
 */
function remove_version_info() {
     return '';
}
add_filter('the_generator', 'remove_version_info'); 
 
remove_action( 'wp_head', 'wp_generator' );

/**
 * Show less info to users on failed login for security.
 * (Will not let a valid username be known.)
 *
 * @return string
 */
function show_less_login_info() {
	return __('<strong>ERROR</strong> Invalid Username or Password','webmat');
}

add_filter( 'login_errors', 'show_less_login_info' );
