<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package theme
 */

$container = get_theme_mod( 'theme_container_type' );
if ( 'container-fluid' == $container )
	$container_fluid = 'style="width:100%"';
else
	$container_fluid = '';

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

	<div id="topbar" class="wrapper-fluid">
		<div class="row m-0 justify-content-end text-center text-md-left">
			<div class="col-md-8 col-lg-6 infos">

				<span class="text pr-3">
					<a class="btn-contact" href="<?php echo get_option( 'href_contact', '#' ); ?>">
						<?php echo get_option( 'contact', 'Contactez-nous' ); ?>
					</a>
				</span>
				<span class="tel-mail">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<?php echo get_option( 'tel', '06 00 00 00 00' ); ?>
					/
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
					<?php echo get_option( 'mail', 'contact@exemple.com' ); ?>
				</span>

				<?php if ( is_user_logged_in() ) { ?>

					<span class="account">
						/
						<i class="fa fa-user" aria-hidden="true"></i>
						<a class="btn-account" href="<?php echo get_permalink( get_option('booked_appointment_success_redirect_page') ); ?>">
							<?php _e( 'My account', 'webmat' ); ?>
						</a>
					</span>

				<?php } else { ?>
					<span class="account">
						/
						<i class="fa fa-user" aria-hidden="true"></i>
						<a class="btn-login" href="<?php echo get_permalink( get_option('booked_appointment_success_redirect_page') ); ?>">
							<?php _e( 'Login', 'webmat' ); ?>
						</a>
					</span>

				<?php } ?>

			</div>
		</div>
	</div>

	<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
	'webmat' ); ?></a>

	<header class="wrapper wrapper-navbar pt-1 pb-1" id="wrapper-navbar">


			<div class="container wrapper-header" <?= $container_fluid ?>>
				<div class="row">

					<div class="d-flex col-sm-12 col-lg-3 p-0 align-items-center justify-content-center justify-content-lg-start">

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

					<div class="d-flex col-sm-12 col-lg-9 p-0 align-items-center justify-content-center justify-content-lg-end">

						<nav class="navbar navbar-expand-lg p-0 navbar-light text-center text-lg-right">

							<div class="container wrapper-header pr-0 pl-0 pt-lg-4 justify-content-center" data-toggle="affix" <?= $container_fluid ?>>

								<button class="navbar-toggler mb-1 mt-2" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</button>

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
							</div><!-- .container -->

						</nav><!-- .site-navigation -->

					</div>
				</div>
			</div>


	</header><!-- .wrapper-navbar end -->

	<?php if ( !is_front_page() ) { ?>

		<?php

		$post_id = false;

		if( is_home() ) {
			$post_id = get_option( 'page_for_posts' );
		}

		$image = get_field('header', $post_id);
		$display = get_field('display_header', $post_id);


		if( !empty($image) && $display ) {
			$image_url = $image['url'];
			$bg = 'style="background-image:url('.$image_url.')"; background-size:contain';
		} else if ( !$display ) {
			$bg = 'style="background-image:none;min-height:100px;background-color: #fae9f3;padding: 2.5em 0;"';
		} else {
			$bg = '';
		}


		?>

		<div id="sub-bar" <?php echo $bg; ?>>
			<div class="container">
				<div class="row">

					<div class="col-12" style="max-width: 1250px;margin: auto;">
						<header class="entry-header">
							<h1 class="page-title entry-title" itemprop="headline">
								<?php
								global $post;
								$template = get_page_template_slug( $post->ID );

								if ( is_search() ) {
									echo '<span>';
									_e( 'Search Results for: ', 'webmat' );
									echo esc_attr(get_search_query());
									echo '</span>';
								} else if ( is_archive() ) {
									echo '<span>';
										the_archive_title();
									echo '</span>';
								} else if ( is_404() ) {
									echo '<span>';
										_e( 'Page Not Found', 'webmat' );
									echo '</span>';
								} else if ( is_home() ) {
									echo '<span>';
										single_post_title();
									echo '</span>';
								} else {
									echo '<span>';
										the_title();
									echo '</span>';
								}
								?>
							</h1>
						</header><!-- .entry-header -->
					</div>

				</div>
			</div>
		</div>
	<?php } ?>
