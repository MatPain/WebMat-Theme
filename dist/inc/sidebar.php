<?php
/**
 * Declaring widgets
 *
 * @package theme
 */

/**
 * Count number of widgets in a sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 */
if ( ! function_exists( 'slbd_count_widgets' ) ) {
	function slbd_count_widgets( $sidebar_id ) {
		// If loading from front page, consult $_wp_sidebars_widgets rather than options
		// to see if wp_convert_widget_settings() has made manipulations in memory.
		global $_wp_sidebars_widgets;
		if ( empty( $_wp_sidebars_widgets ) ) :
			$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
		endif;

		$sidebars_widgets_count = $_wp_sidebars_widgets;

		if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
			$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
			$widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
			if ( $widget_count % 4 == 0 || $widget_count > 6 ) :
				// Four widgets er row if there are exactly four or more than six
				$widget_classes .= ' col-md-3';
			elseif ( 6 == $widget_count ) :
				// If two widgets are published
				$widget_classes .= ' col-md-2';
			elseif ( $widget_count >= 3 ) :
				// Three widgets per row if there's three or more widgets
				$widget_classes .= ' col-md-4';
			elseif ( 2 == $widget_count ) :
				// If two widgets are published
				$widget_classes .= ' col-md-6';
			elseif ( 1 == $widget_count ) :
				// If just on widget is active
				$widget_classes .= ' col-md-12';
			endif;
			return $widget_classes;
		endif;
	}
}

if ( ! function_exists( 'theme_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function theme_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Right Sidebar', 'webmat' ),
			'id'            => 'right-sidebar',
			'description'   => __( 'Right sidebar widget area', 'webmat' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => __( 'Left Sidebar', 'webmat' ),
			'id'            => 'left-sidebar',
			'description'   => __( 'Left sidebar widget area', 'webmat' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Full', 'webmat' ),
			'id'            => 'footerfull',
			'description'   => __( 'Widget area below main content and above footer', 'webmat' ),
		    'before_widget'  => '<div id="%1$s" class="footer-widget %2$s '. slbd_count_widgets( 'footerfull' ) .'">',
		    'after_widget'   => '</div><!-- .footer-widget -->',
		    'before_title'   => '<h4 class="widget-title">',
		    'after_title'    => '</h4>',
		) );

		register_sidebar( array(
			'name'          => __( 'Col 1 Footer', 'webmat' ),
			'id'            => 'footer1',
			'description'   => __( 'Widget Col 1 footer', 'webmat' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
		    'before_title'   => '<h4 class="widget-title">',
		    'after_title'    => '</h4>',
		) );

		register_sidebar( array(
			'name'          => __( 'Col 2 Footer', 'webmat' ),
			'id'            => 'footer2',
			'description'   => __( 'Widget Col 2 footer', 'webmat' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
		    'before_title'   => '<h4 class="widget-title">',
		    'after_title'    => '</h4>',
		) );

		register_sidebar( array(
			'name'          => __( 'Col 3 Footer', 'webmat' ),
			'id'            => 'footer3',
			'description'   => __( 'Widget Col 3 footer', 'webmat' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
		    'before_title'   => '<h4 class="widget-title">',
		    'after_title'    => '</h4>',
		) );

	}
} // endif function_exists( 'theme_widgets_init' ).
add_action( 'widgets_init', 'theme_widgets_init' );


// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

// Widgets
require get_template_directory().'/inc/widgets/posts-tabs.php';
