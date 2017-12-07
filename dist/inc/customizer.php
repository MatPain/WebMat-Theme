<?php
/**
 * theme Theme Customizer
 *
 * @package theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'theme_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function theme_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'theme_customize_register' );

if ( ! function_exists( 'theme_func_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function theme_func_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'theme_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'webmat' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'webmat' ),
			'priority'    => 160,
		) );

		$wp_customize->add_setting( 'theme_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'container_type', array(
					'label'       => __( 'Container Width', 'webmat' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'webmat' ),
					'section'     => 'theme_theme_layout_options',
					'settings'    => 'theme_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'webmat' ),
						'container-fluid' => __( 'Full width container', 'webmat' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'theme_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'theme_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'webmat' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",	'webmat' ),
					'section'     => 'theme_theme_layout_options',
					'settings'    => 'theme_sidebar_position',
					'type'        => 'select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'webmat' ),
						'left'  => __( 'Left sidebar', 'webmat' ),
						'both'  => __( 'Left & Right sidebars', 'webmat' ),
						'none'  => __( 'No sidebar', 'webmat' ),
					),
					'priority'    => '20',
				)
			) );
	}
} // endif function_exists( 'theme_func_customize_register' ).
add_action( 'customize_register', 'theme_func_customize_register' );


/**
 * Used by hook: 'customize_preview_init'
 * 
 * @see add_action('customize_preview_init',$func)
 */
if ( ! function_exists( 'theme_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function theme_customize_preview_js() {
		wp_enqueue_script( 'theme_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'theme_customize_preview_js' );
