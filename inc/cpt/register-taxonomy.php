<?php

/*
 * for more information on taxonomies, go here:
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
*/
	

// register Taxonomy Resource Category	
register_taxonomy( 'resource_cat', 
	array('resource'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */             
		'labels' => array(
			'name' => __( 'Resource Categories', 'webmat' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Resource Category', 'webmat' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Resource Categories', 'webmat' ), /* search title for taxomony */
			'all_items' => __( 'All Resource Categories', 'webmat' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Resource Category', 'webmat' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Resource Category:', 'webmat' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Resource Category', 'webmat' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Resource Category', 'webmat' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Resource Category', 'webmat' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Resource Category Name', 'webmat' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'category' ),
	)
);   

	
// register Taxonomy Resource Tags	
register_taxonomy( 'resource_tag', 
	array('resource'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => false,    /* if this is false, it acts like tags */                
		'labels' => array(
			'name' => __( 'Resource Tags', 'webmat' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Resource Tag', 'webmat' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Resource Tags', 'webmat' ), /* search title for taxomony */
			'all_items' => __( 'All Resource Tags', 'webmat' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Resource Tag', 'webmat' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Resource Tag:', 'webmat' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Resource Tag', 'webmat' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Resource Tag', 'webmat' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Resource Tag', 'webmat' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Resource Tag Name', 'webmat' ) /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
	)
); 

?>