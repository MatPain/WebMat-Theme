<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package theme
 */

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function theme_entry_meta() {
	global $post;

	if ( has_post_thumbnail() ) {
		echo '<div class="post-thumbnail">';
			// gestion avancée des attributs
				$attr_th = array(
					'title'    => get_the_title(),
					'itemprop'    => 'image',
					'alt'        => '');
				the_post_thumbnail( 'large', $attr_th );
			// récupération de l’url de la miniature
			$src = wp_get_attachment_image_src(
			get_post_thumbnail_id($post->ID), 'thumbnail', false);
			echo '<meta itemprop="thumbnailUrl" content="'.$src[0].'">';
		echo '</div>';
	}

	echo '<div class="entry-meta">';

			echo '<a href="'. get_permalink() .'" rel="bookmark"><time datetime="'. get_the_time('c').'" itemprop="datePublished">';
			echo __( 'Posted on', 'webmat' ) . '&nbsp;<span class="entry-date updated published">' . get_the_date() . '&nbsp;' . __( 'at', 'webmat' ) . '&nbsp;' . get_the_time() . '</span></a>';

			echo '&nbsp;' . __( 'by', 'webmat' ) . '&nbsp;<span class="vcard author author_name"><span class="fn">' . get_the_author() . '</span></span>';

			if (get_the_modified_time() != get_the_time()) {
				$updated_time = get_the_modified_time( get_option( 'date_format' ) );

				echo '<time datetime="' . get_the_modified_time('c') . '" itemprop="dateModified">';
				echo '&nbsp;' . __( 'and', 'webmat' ) . '&nbsp;' . __( 'updated on', 'webmat' ) . '&nbsp;<span class="updated">' . $updated_time . '</span>';
			}
	echo '</div><!-- .entry-meta-->';

}


function theme_entry_meta_archive() {
	global $post;

	echo '<div class="entry-meta">';

			echo '<time datetime="'. get_the_time('c').'" itemprop="datePublished">';
			echo __( 'Posted on', 'webmat' ) . '&nbsp;<span class="entry-date updated published">' . get_the_date() . '&nbsp;' . __( 'at', 'webmat' ) . '&nbsp;' . get_the_time() . '</span>';

			echo '&nbsp;' . __( 'by', 'webmat' ) . '&nbsp;<span class="vcard author author_name"><span class="fn">' . get_the_author() . '</span></span>';

			if (get_the_modified_time() != get_the_time()) {
				$updated_time = get_the_modified_time( get_option( 'date_format' ) );

				echo '<time datetime="' . get_the_modified_time('c') . '" itemprop="dateModified">';
				echo '&nbsp;' . __( 'and', 'webmat' ) . '&nbsp;' . __( 'updated on', 'webmat' ) . '&nbsp;<span class="updated">' . $updated_time . '</span>';
			}
	echo '</div><!-- .entry-meta-->';

}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function theme_entry_footer() {

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {

		echo '<footer class="entry-footer">';

		/* translators: used between list items, there is a space after the comma */
		//$categories_list = get_the_category_list( esc_html__( ', ', 'webmat' ) );
		$post_cats = get_the_category();
		$categories_list = '';
		foreach ($post_cats as $cat)
			$categories_list .= '<a itemprop="about" href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name.'</a>, ';
		$categories_list = trim( $categories_list, ', ');

		if ( $categories_list ) {
			printf( '<div class="cat-links">' . esc_html__( 'Categories: %1$s', 'webmat' ) . '</div>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		//$tags_list = get_the_tag_list( '', esc_html__( ', ', 'webmat' ) );
		$post_tags = get_the_tags();
		$tag_list = '';
		if( $post_tags ) {
			foreach ($post_tags as $tag)
				$tag_list .= '<a rel="tag" itemprop="keywords" href="'.esc_url(get_tag_link($tag->term_id)).'">'.$tag->name.'</a>, ';
			$tag_list = trim( $tag_list, ', ');
			printf( '<div class="tags-links">' . esc_html__( 'Tags: %1$s', 'webmat' ) . '</div>', $tag_list ); // WPCS: XSS OK.
		}

		echo '</footer><!-- .entry-footer -->';

	}

	if ( ( comments_open() ) ) {
		echo '<a href="#comments" itemprop="discussionUrl">';
			comments_number( esc_html__( 'Leave a comment', 'webmat' ) . ' <meta itemprop="interactionCount" content="0 UserComments">', esc_html__( '1 Comment', 'webmat' ) . '<meta itemprop="interactionCount" content="1 UserComments">', esc_html__( '% Comments', 'webmat' ) . '<meta itemprop="interactionCount" content="% UserComments">' );
		echo '</a>';
	}

}


/**
 * Display navigation to next/previous post when applicable.
 */
function theme_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
			<nav class="container navigation post-navigation">
				<div class="row nav-links justify-content-between">
					<?php

						if ( get_previous_post_link() ) {
							previous_post_link( '<span class="nav-previous">%link</span>', _x( '<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link', 'webmat' ) );
						}
						if ( get_next_post_link() ) {
							next_post_link( '<span class="nav-next">%link</span>', _x( '%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link', 'webmat' ) );
						}
					?>
				</div><!-- .nav-links -->
			</nav><!-- .navigation -->

	<?php
}


/**
 * Flush out the transients used in theme_categorized_blog.
 */
function theme_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'theme_categories' );
}
add_action( 'edit_category', 'theme_category_transient_flusher' );
add_action( 'save_post',     'theme_category_transient_flusher' );
