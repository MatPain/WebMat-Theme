<?php
/**
 * Left sidebar check.
 *
 * @package theme
 */

?>

<?php
$sidebar_pos = get_theme_mod( 'theme_sidebar_position' );
?>

<?php if ( class_exists( 'FLBuilderModel') && FLBuilderModel::is_builder_enabled() ) { ?>

<?php } else { ?>

	<?php if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>
		<?php get_sidebar( 'left' ); ?>
	<?php endif; ?>

<?php } ?>


<?php

	if ( class_exists( 'FLBuilderModel') && FLBuilderModel::is_builder_enabled() ) {

		echo '<div class="col-md-12 content-area p-0 fl-builder-active" id="primary">';

	} elseif ( 'right' === $sidebar_pos ) {

		if ( is_active_sidebar( 'right-sidebar' ) || is_active_sidebar( 'left-sidebar' ) ) {
			echo '<div class="col-md-8 pr-2 content-area" id="primary">';
		} else {
			echo '<div class="col-md-12 content-area" id="primary">';
		}

	} elseif ( 'left' === $sidebar_pos  ) {

		if ( is_active_sidebar( 'left-sidebar' ) ) {
			echo '<div class="col-md-8 pl-2 content-area" id="primary">';
		} else {
			echo '<div class="col-md-12 content-area" id="primary">';
		}

	} elseif ( is_active_sidebar( 'right-sidebar' ) && is_active_sidebar( 'left-sidebar' ) ) {

		if ( 'both' === $sidebar_pos ) {
			echo '<div class="col-md-6 p-0 content-area" id="primary">';
		} else {
			echo '<div class="col-md-12 content-area" id="primary">';
		}

	} else {

		echo '<div class="col-md-12 content-area" id="primary">';

	}

?>
