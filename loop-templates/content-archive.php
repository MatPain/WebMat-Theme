<?php
/**
 * Search results partial template.
 *
 * @package theme
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="container">
		<div class="row align-middle">


	<?php if ( has_post_thumbnail() ) { ?>
		<div class="col-md-6 col-lg-3">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium'); ?></a>
		</div>

		<div class="col-md-6 col-lg-9">
	<?php } else { ?>
		<div class="col-lg-12">
	<?php } ?>

			<header class="entry-header">

				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<?php

				if ( get_post_type( get_the_ID() ) == 'post' ) // if is post, show meta date
					theme_entry_meta_archive(); ?>

			</header> <!-- end article header -->

			<section class="entry-content" itemprop="articleBody">
				<?php the_excerpt(); ?>
			</section> <!-- end article section -->


		</div>

</article><!-- #post-## -->
