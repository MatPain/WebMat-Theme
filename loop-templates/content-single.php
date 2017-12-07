<?php
/**
 * Single post partial template.
 *
 * @package theme
 */

$sidebar_pos = get_theme_mod( 'theme_sidebar_position' ); 
 
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if ( 'right' !== $sidebar_pos && 'both' !== $sidebar_pos || wp_is_mobile() ) { ?>			
				
			<?php theme_entry_meta(); ?>
			
			<?php theme_entry_footer(); ?>			
		
	<?php } ?>
	
	<div class="entry-content" itemprop="articleBody">	

		<?php the_content(); ?>

	</div><!-- .entry-content -->
	
	<?php 
	
	if ( class_exists('Multi_Rating') ) {
		global $post;
		
		$post_id = $post->ID;
		
		$general_settings = (array) get_option( Multi_Rating::GENERAL_SETTINGS );
		$save_rating_restriction_types = $general_settings[Multi_Rating::SAVE_RATING_RESTRICTION_TYPES_OPTION];
		$hours = $general_settings[Multi_Rating::SAVE_RATING_RESTRICTION_HOURS_OPTION];
		$ip_address = MR_Utils::get_ip_address();
		
		foreach ( $save_rating_restriction_types as $save_rating_restriction_type ) {
			if ( ( $save_rating_restriction_type == 'ip_address' && MR_Utils::ip_address_validation_check( $ip_address, $post_id, $hours ) == true )
					|| ( $save_rating_restriction_type == 'cookie' && MR_Utils::cookie_validation_check( $post_id ) == true ) ) {
						
						$rating_restriction = true;
					
					}
		}
								
		if ( !isset($rating_restriction) ) {
						
			Multi_Rating_API::display_rating_form();			
			
		}
	}
	
	?>				
	
	
	<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'webmat' ),
		'after'  => '</div>',
	) );
	?>	
	

</article><!-- #post-## -->
