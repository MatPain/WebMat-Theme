<?php
/**
 * Template Name: Avec barre latérale droite et gauche
 * Template Post Type: page
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package theme
 */

get_header();
$container = get_theme_mod( 'theme_container_type' );
?>
test
<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content">

		<div class="row">

			<?php get_sidebar( 'left' ); ?>

			<div
				class="<?php
					if ( is_active_sidebar( 'left-sidebar' ) && !is_active_sidebar( 'right-sidebar' ) ) : ?>col-md-8 pl-2<?php
					elseif ( is_active_sidebar( 'right-sidebar' ) && !is_active_sidebar( 'left-sidebar' ) ) : ?>col-md-8 pr-2<?php
					elseif ( is_active_sidebar( 'left-sidebar' ) && is_active_sidebar( 'right-sidebar' ) ) : ?>col-md-6 pr-2 pl-2<?php
					else : ?>col-md-12<?php
					endif; ?> content-area"
				id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<?php get_sidebar( 'right' ); ?>

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
