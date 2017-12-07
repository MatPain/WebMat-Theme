<?php

/* 
 *
 * http://codex.wordpress.org/Function_Reference/register_post_type)
 *
 */


// register CPT Resource
function register_post_resource() { 

	register_post_type( 'resource', 
		array('labels' => array(
			'name' => __('Resources', 'webmat'), /* This is the Title of the Group */
			'singular_name' => __('Resource', 'webmat'), /* This is the individual type */
			'all_items' => __('All Resources', 'webmat'), /* the all items menu item */
			'add_new' => __('Add New', 'webmat'), /* The add new menu item */
			'add_new_item' => __('Add New Resource', 'webmat'), /* Add New Display Title */
			'edit' => __( 'Edit', 'webmat' ), /* Edit Dialog */
			'edit_item' => __('Edit Resource', 'webmat'), /* Edit Display Title */
			'new_item' => __('New Resource', 'webmat'), /* New Display Title */
			'view_item' => __('View Resource', 'webmat'), /* View Display Title */
			'search_items' => __('Search Resource', 'webmat'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'webmat'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'webmat'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Repository Resources', 'webmat' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-book', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'resource', 'with_front' => true ), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'comments', 'page-attributes', 'revisions')
	 	) /* end of options */
	); /* end of register post type */
	
	
} 
add_action( 'init', 'register_post_resource');


?>