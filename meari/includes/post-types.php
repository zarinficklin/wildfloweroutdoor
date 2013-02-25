<?php

/**
 * Custom types name
 */     
define('POST_TYPE_FAQ', 'faq');

add_action( 'init', 'hana_register_post_types', 0  );
add_action( 'init', 'hana_register_taxonomies', 0  );

if( isset( $_GET['post_type'] ) )
{
    if( $_GET['post_type'] == POST_TYPE_FAQ) {
    	add_action( 'manage_posts_custom_column',  'hana_faq_custom_columns');
    	add_filter( 'manage_edit-'.TYPE_FAQ.'_columns', 'hana_faq_edit_columns'); 
	} 
}

/**
 * Register post types for the theme
 *
 * @return void
 */
function hana_register_post_types(){
    
    register_post_type(         
        POST_TYPE_FAQ,
        array(
            'description' => __('Faq', 'meari'),
            'exclude_from_search' => false,
            'show_ui' => true,
            'labels' => hana_label(__('Faq', 'meari'), __('Faqs', 'meari')),
            'supports' => array( 'title', 'editor', 'revisions' ),
            'public' => true,             
			'show_in_nav_menus' => false,
            'capability_type' => 'page',
            'publicly_queryable' => true,
            'rewrite' => array( 'slug' => POST_TYPE_FAQ, 'with_front' => true )
        )
    );
}

/**
 * Registers taxonomies
 * 
 */
function hana_register_taxonomies()
{   
    register_taxonomy('category-faq', array( POST_TYPE_FAQ ), array(
        'hierarchical' => true,
        'labels' => hana_label_tax(__('Faq Category', 'meari'), __('Faq Categories', 'meari')),
        'show_ui' => true, 
		'show_in_nav_menus' => false,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'faq/category', 'with_front' => false )
    ));
}    


function hana_faq_edit_columns($columns){
	$columns = array(
	    'cb' => '<input type="checkbox" />',
	    'title' => __( 'Question', 'meari' ),
	    'description' => __( 'Answer', 'meari' ),
            'category-faq' => __( 'FAQ Category', 'meari' ),
	);

	
	return $columns;
}

function hana_faq_custom_columns($column){
	global $post;
	                                      
	switch ($column) {
	    case "description":
	      	add_filter('excerpt_length', 'hana_new_excerpt_length_faq');
                add_filter('excerpt_more', 'hana_new_excerpt_more_faq');
		the_excerpt();
                break;
            case "category-faq":
                echo get_the_term_list($post->ID, 'category-faq', '', ', ','');
                break;
	}                            
}	      	                  
	
function hana_new_excerpt_length_faq($length) {
	return 20;
}                                
	
function hana_new_excerpt_more_faq($more) {
	return '[...]';
}     

/**
 * Return Labels Post
 *
 * @return array
 */
function hana_label($singular_name, $name, $title = FALSE)
{
    if( !$title )
        $title = $name;
        
    return array(
      "name" => $title,
      "singular_name" => $singular_name,
      "add_new" => __("Add New", 'meari'),
      "add_new_item" => sprintf( __( "Add New %s", 'meari' ), $singular_name),
      "edit_item" => sprintf( __( "Edit %s", 'meari' ), $singular_name),
      "new_item" => sprintf( __( "New %s", 'meari'), $singular_name),
      "view_item" => sprintf( __( "View %s", 'meari'), $name),
      "search_items" => sprintf( __( "Search %s", 'meari'), $name),
      "not_found" => sprintf( __( "No %s found", 'meari'), $name),
      "not_found_in_trash" => sprintf( __( "No %s found in Trash", 'meari'), $name),
      "parent_item_colon" => ""
  );
}            

/**
 * Return Labels Post
 *
 * @return array
 */
function hana_label_tax($singular_name, $name)
{
    return array(
        'name' => $name,
        'singular_name' => $singular_name,
        'search_items' => sprintf( __( 'Search %s', 'meari' ), $name),
        'all_items' => sprintf( __( 'All %s', 'meari' ), $name),
        'parent_item' => sprintf( __( 'Parent %s', 'meari' ), $singular_name),
        'parent_item_colon' => sprintf( __( 'Parent %s:', 'meari' ), $singular_name),
        'edit_item' => sprintf( __( 'Edit %', 'meari' ), $singular_name), 
        'update_item' => sprintf( __( 'Update %s', 'meari' ), $singular_name),
        'add_new_item' => sprintf( __( 'Add New %s', 'meari' ), $singular_name),
        'new_item_name' => sprintf( __( 'New %s Name', 'meari' ), $singular_name),
        'menu_name' => $name,
  );
}