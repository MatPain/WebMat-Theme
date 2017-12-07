<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

/************* DASHBOARD WIDGETS *****************/
// Disable default dashboard widgets
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	// wp..
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);

}
add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 999);


/************* CUSTOMIZE ADMIN *******************/
// Custom Backend Footer
function theme_custom_admin_footer() {	
	
	$link = '<a href="https://webmat.pro" target="_blank">WebMat</a>';
	
	$text  = '<span id="footer-thankyou">';
	$text .=  sprintf( esc_html__( 'Developed with passion by %1$s ', 'webmat' ), $link );
	$text .= '</span>';
	
	return $text;
}

// adding it to the admin area
add_filter('admin_footer_text', 'theme_custom_admin_footer');


// Add options thème
require get_template_directory().'/inc/admin-options.php';