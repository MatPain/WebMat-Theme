<?php
/**
 * The right sidebar containing the main widget area.
 *
 */

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$classes = get_body_class();
?>
<?php if ( in_array( 'sd-both', $classes ) && is_active_sidebar( 'left-sidebar' ) ) : ?>
<div class="col-md-3 pl-2 widget-area" id="right-sidebar" class="sidebar" role="complementary">
	<?php else : ?>
<div class="col-md-4 pl-2 widget-area" id="right-sidebar" class="sidebar" role="complementary">
	<?php endif; ?>
	
	<div id="sidebar-wrapper">
	
			<?php if ( is_singular( 'post' ) && !wp_is_mobile() ) { ?>
				<aside class="widget info-single">		
					
					<?php theme_entry_meta(); ?>
					
					<?php theme_entry_footer(); ?>		
				
				</aside>
			<?php } ?>
		
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
	
	</div>
</div><!-- #secondary -->
