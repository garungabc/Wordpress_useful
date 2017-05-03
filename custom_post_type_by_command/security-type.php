<?php

	$args = array(
	    "label" 						=> _x('Category', 'category label', "garung"),
	    "singular_label" 				=> _x('Name display', 'category singular label', "garung"),
	    'public'                        => true,
	    'hierarchical'                  => true,
	    'show_ui'                       => true,
	    'show_in_nav_menus'             => true,
	    'args'                          => array( 'orderby' => 'term_order' ),
        'rewrite'                       => array(
                                            'slug' => 'slug-for-category-of-this-post-type',
                                            'with_front' => false ),
	    'query_var'                     => true
	);

	register_taxonomy( 'taxonomy-of-post-type', 'taxonomy-display', $args );


	add_action('init', 'post_type_register');

	function post_type_register() {

	    $labels = array(
	        'name' => _x('Name display', 'post type general name', "garung"),
	        'singular_name' => _x('Name display', 'post type singular name', "garung"),
	        'add_new' => _x('Add New', 'job', "garung"),
	        'add_new_item' => __('Add New', "garung"),
	        'edit_item' => __('Edit', "garung"),
	        'new_item' => __('New', "garung"),
	        'view_item' => __('View', "garung"),
	        'search_items' => __('Search', "garung"),
	        'not_found' =>  __('No post have been added yet', "garung"),
	        'not_found_in_trash' => __('Nothing found in Trash', "garung"),
	        'parent_item_colon' => ''
	    );

	    $args = array(
	        'labels' => $labels,
	        'public' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'show_in_nav_menus' => true,
            'rewrite' =>  array('slug' => 'slug-for-post-of-this-post-type','with_front' => false ),
	        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
	        'has_archive' => true,
	        'taxonomies' => array('taxonomy-of-post-type', 'post_tag',)
	       );

	    register_post_type( 'taxonomy-display' , $args );
	}
	add_filter("manage_edit-post_type_columns", "post_type_edit_columns");
	function post_type_edit_columns($columns){
	        $columns = array(
	            "cb" => "<input type=\"checkbox\" />",
	            "thumbnail" => "",
	            "title" => __("Name display", "garung"),
	            "description" => __("Description", "garung"),
	            "taxonomy-of-post-type" => __("Categories", "garung")
	        );

	        return $columns;
	}

?>