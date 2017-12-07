<?php
/**
 * Partial template for content in page.php
 *
 * @package theme
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php /* <header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header --> */ ?>

	<div class="entry-content" itemprop="articleBody">

		<?php the_content(); ?>

	</div><!-- .entry-content -->
	
	<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'webmat' ),
		'after'  => '</div>',
	) );
	?>	

	<footer class="entry-footer">

		<?php theme_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
