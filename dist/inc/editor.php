<?php
/**
 * theme modify editor
 *
 * @package theme
 */

/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
  add_editor_style( 'assets/css/theme.min.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

// Add TinyMCE
function theme_tiny_mce_style_formats( $buttons ) {

	array_unshift( $buttons, 'fontselect' ); // Font Select
	array_unshift( $buttons, 'fontsizeselect' ); //Font Size Select
	array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
add_filter( 'mce_buttons_2', 'theme_tiny_mce_style_formats' );


// Add justify button (after WP 4.7)
function ratb_tiny_mce_buttons_justify( $buttons_array ){		
	if ( !in_array( 'alignjustify', $buttons_array ) && in_array( 'alignright', $buttons_array ) ){
		$key = array_search( 'alignright', $buttons_array );
		$inserted = array( 'alignjustify' );
		array_splice( $buttons_array, $key + 1, 0, $inserted );
	}	
	return $buttons_array;	
}
add_filter( 'mce_buttons', 'ratb_tiny_mce_buttons_justify', 5 );

// Init TinyMCE
function theme_tiny_mce_before_init( $settings ) {

  $style_formats = array(
      array(
          'title' => 'Lead Paragraph',
          'selector' => 'p',
          'classes' => 'lead',
          'wrapper' => true
          ),
      array(
          'title' => 'Small',
          'inline' => 'small'
      ),
      array(
          'title' => 'Blockquote',
          'block' => 'blockquote',
          'classes' => 'blockquote',
          'wrapper' => true
      ),
			array(
          'title' => 'Blockquote Footer',
          'block' => 'footer',
          'classes' => 'blockquote-footer',
          'wrapper' => true
      ),
			array(
          'title' => 'Cite',
          'inline' => 'cite'
      )
  );
  
    if ( isset( $settings['style_formats'] ) ) {
      $orig_style_formats = json_decode($settings['style_formats'],true);
      $style_formats = array_merge($orig_style_formats,$style_formats);
    }

    $settings['style_formats'] = json_encode( $style_formats );
	$settings['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
	$settings['wordpress_adv_hidden'] = FALSE;// Second bar open
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'theme_tiny_mce_before_init' );