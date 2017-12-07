<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package theme
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'theme_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<footer class="footer pt-4 pb-4 clearfix" id="colophon">
	<div class="" id="wrapper-footer">
		<div class="<?php echo $container ?>">
			<?php if ( is_active_sidebar( 'footer1' ) || is_active_sidebar( 'footer2' ) || is_active_sidebar( 'footer3' ) ) { ?>
				<div class="row">

					<?php if ( is_active_sidebar( 'footer1' ) ) { ?>
						<div id="col1" class="col-md-12 col-lg-4 pb-2 ml-auto mr-auto">

							<?php dynamic_sidebar( 'footer1' ); ?>

						</div>
					<?php } ?>

					<?php if ( is_active_sidebar( 'footer2' ) ) { ?>
						<div id="col2" class="col-md-12 col-lg-4 pb-2 ml-auto mr-auto">

							<?php dynamic_sidebar( 'footer2' ); ?>

						</div>
					<?php } ?>

					<?php if ( is_active_sidebar( 'footer3' ) ) { ?>
						<div id="col3" class="col-md-12 col-lg-4 pb-2 ml-auto mr-auto">

							<?php dynamic_sidebar( 'footer3' ); ?>

						</div>
					<?php } ?>

				</div>
			<?php } ?>
			<div class="row">

				<div class="col-md-12 col-lg-4 text-center text-lg-left mt-4">
					<div class="site-info nav-link">
						<span class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</span>
					</div><!-- .site-info -->
				</div><!--col end -->

				<div class="col-md-12 col-lg-8 ">
					<nav class="nav justify-content-center justify-content-lg-end mt-4">
						<?php if ( has_nav_menu( 'footer-nav' ) ) { ?>
							<?php
							wp_nav_menu(array(
								'theme_location'  => 'footer-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'footer-menu',
								'walker'          => new WP_Bootstrap_Navwalker(),
							));
							?>
						<?php } else { ?>

							<a href="<?php echo admin_url('/nav-menus.php'); ?>"><?php _e('Please select a menu', 'webmat'); ?></a>

						<?php } ?>
					</nav>
				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- wrapper end -->

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<?php echo get_option( 'tag-body-footer' ); ?>

</body>

</html>
