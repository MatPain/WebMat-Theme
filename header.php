<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package theme
 */

$container = get_theme_mod( 'theme_container_type' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>

	<?php echo get_option( 'tag-head' ); ?>

</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
	'webmat' ); ?></a>

	<header class="wrapper wrapper-navbar pt-1 pb-1" id="wrapper-navbar">
			<div class="<?= $container ?> wrapper-header">
				<div class="row">

					<div class="d-flex col-sm-12 col-lg-3 align-items-center justify-content-center justify-content-lg-start">

						<!-- Your site title as branding in the menu -->
						<?php if ( ! has_custom_logo() ) { ?>

							<?php if ( is_front_page() && is_home() ) : ?>

								<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

							<?php else : ?>

								<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

							<?php endif; ?>


						<?php } else {
							the_custom_logo();
						} ?><!-- end custom logo -->

					</div>

					<div class="d-flex col-sm-12 col-lg-9 align-items-center justify-content-center justify-content-lg-end">

						<nav class="navbar navbar-expand-lg navbar-light text-center text-lg-right">

							<div class="<?= $container ?> wrapper-header pr-0 pl-0 pt-lg-4 justify-content-center" data-toggle="affix">

								<button class="navbar-toggler mb-1 mt-2" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</button>

								<?php if ( has_nav_menu( 'main-nav' ) ) { ?>
									<!-- The WordPress Menu goes here -->
									<?php wp_nav_menu(
										array(
											'theme_location'  => 'main-nav',
											'container_class' => 'collapse navbar-collapse justify-content-end',
											'container_id'    => 'navbarNavDropdown',
											'menu_class'      => 'navbar-nav',
											'fallback_cb'     => '',
											'menu_id'         => 'main-menu',
											'walker'          => new WP_Bootstrap_Navwalker(),
										)
									); ?>
								<?php } else { ?>

									<a href="<?php echo admin_url('/nav-menus.php'); ?>"><?php _e('Please select a menu', 'webmat'); ?></a>

								<?php } ?>
							</div><!-- .container -->

						</nav><!-- .site-navigation -->

					</div>
				</div>
			</div>


	</header><!-- .wrapper-navbar end -->


	<?php if ( !is_front_page() && show_post_header() ) { ?>

		<div id="sub-bar">
			<div class="container">
				<div class="row">

					<div class="col-12" style="max-width: 1250px;margin: auto;">
						<header class="entry-header">
							<h1 class="page-title entry-title" itemprop="headline">
								<span>
									<?php
									if ( is_search() ) {
										_e( 'Search Results for: ', 'webmat' );
										echo esc_attr(get_search_query());
									} else if ( is_archive() ) {
										the_archive_title();
									} else if ( is_404() ) {
										_e( 'Page Not Found', 'webmat' );
									} else if ( is_home() ) {
										single_post_title();
									} else {
										the_title();
									}
									?>
								</span>
							</h1>
						</header><!-- .entry-header -->
					</div>

				</div>
			</div>
		</div>
	<?php } ?>
