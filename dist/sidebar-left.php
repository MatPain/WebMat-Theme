<?php
/**
 * The sidebar containing the main widget area.
 *
 */

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$classes = get_body_class();
?>

<?php if ( in_array( 'sd-both', $classes ) && is_active_sidebar( 'right-sidebar' ) ) : ?>
<div class="col-md-3 pr-2 widget-area" id="left-sidebar" class="sidebar" role="complementary">
	<?php else : ?>
<div class="col-md-4 pr-2 widget-area" id="left-sidebar" class="sidebar" role="complementary">
	<?php endif; ?>
	
	<div id="sidebar-wrapper">
	
		<?php dynamic_sidebar( 'left-sidebar' ); ?>
		
	</div>
</div><!-- #secondary -->
