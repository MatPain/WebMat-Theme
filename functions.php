<?php
/**
 * theme functions and definitions
 *
 * @package theme
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register sidebar area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/sidebar.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

/**
 * Remove 4.2 Emoji Support
 */
require get_template_directory().'/inc/disable-emoji.php';

/**
 * Use this as a template for custom post types
 */
require get_template_directory().'/inc/custom-post-type.php';

/**
 * Customize the WordPress admin
 */
require get_template_directory().'/inc/admin.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';



/**
 * Load Beaver Builder functions.
 */
if ( class_exists( 'FLBuilder' ) )
	require get_template_directory().'/inc/plugins/beaver-builder.php';

/**
 * Load Yoast functions.
 */
if ( defined( 'WPSEO_VERSION' ) )
	require get_template_directory() . '/inc/plugins/yoast.php';

/**
 * Load Woocommerce functions.
 */
if ( class_exists( 'Woocommerce' ) )
	require get_template_directory() . '/inc/plugins/woocommerce.php';
