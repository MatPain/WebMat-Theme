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

		<div class="container <?= $container_fluid ?>">

			<div class="row">

				<?php if ( is_active_sidebar( 'footer1' ) ) { ?>
					<div id="col1" class="col-md-12 col-lg-4 pr-4">

						<?php dynamic_sidebar( 'footer1' ); ?>

					</div>
				<?php } ?>

				<?php if ( is_active_sidebar( 'footer2' ) ) { ?>
					<div id="col2" class="col-md-12 col-lg-4 pl-4 pr-4">

						<?php dynamic_sidebar( 'footer2' ); ?>

					</div>
				<?php } ?>

				<?php if ( is_active_sidebar( 'footer3' ) ) { ?>
					<div id="col3" class="col-md-12 col-lg-4 pl-4">

						<?php dynamic_sidebar( 'footer3' ); ?>

					</div>
				<?php } ?>

			</div>
			<div class="row">

				<div class="col-md-12 col-lg-4 text-center text-sm-center text-md-center text-lg-left mt-4">
					<div class="site-info nav-link">
						<span class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</span>
					</div><!-- .site-info -->
				</div><!--col end -->

				<div class="col-md-12 col-lg-8 ">
					<nav class="nav justify-content-md-center justify-content-lg-end mt-4">
						<?php
						wp_nav_menu(array(
							'theme_location'  => 'footer-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'footer-menu',
							'walker'          => new WP_Bootstrap_Navwalker(),
						));
						?>
					</nav>
				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- wrapper end -->

</footer><!-- #colophon -->

</div><!-- #page -->



<!--

<div id="contact-fix" class="contact-item">

	<span class="arrow arrow-up"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
	<span class="arrow arrow-down" style="display:none;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>

	<div class="head">
		<div class="overlay"></div>

		<div class="text">

			<div class="title">
				Une question ?
			</div>
			<div class="subtitle">
				Contactez un de nos conseiller
			</div>
			<div class="tel">
				01 70 36 76 00
			</div>
			<div class="subtel">
				prix d'un appel local
			</div>
		</div>

	</div>

	<div class="content-form inactive">
		Formulaire
	</div>

</div><!--#contact-fix-->



<?php wp_footer(); ?>

<?php echo get_option( 'tag-body-footer' ); ?>

</body>

</html>
