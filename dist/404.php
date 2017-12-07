<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package theme
 */

get_header();

$container   = get_theme_mod( 'theme_container_type' );
$sidebar_pos = get_theme_mod( 'theme_sidebar_position' );

?>

<div class="wrapper" id="404-wrapper">

	<div class="<?php echo esc_html( $container ); ?> " id="content" tabindex="-1">

		<div class="row center-row justify-content-center">

			<div class="content-area d-flex text-center align-items-center" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">

						<header class="page-header">

							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.',
							'webmat' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?',
							'webmat' ); ?></p>

							<?php get_search_form(); ?>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>