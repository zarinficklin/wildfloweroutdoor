<?php
/**
 * Portfolio
 *
 * Main functions for the portfolio manage.
 *  
 * @author Hana
 */

/**
 * ADD THE ACTIONS
 */
add_action('init', 'hana_register_portfolio_category');  
add_action('init', 'hana_register_portfolio_post_type');  
add_action('manage_posts_custom_column',  'hana_portfolio_show_columns'); 
add_filter('manage_edit-portfolio_columns', 'hana_portfolio_columns');

/**
 * Registers the portfolio category taxonomy.
 */
function hana_register_portfolio_category(){

	register_taxonomy("portfolio_category",
	array(HANA_PORTFOLIO_POST_TYPE),
	array(	"hierarchical" => true,
			"label" => "Portfolio Categories", 
			"singular_label" => "Portfolio Categories", 
			"rewrite" => true,
			"query_var" => true
	));
}

/**
 * Registers the portfolio custom type.
 */
function hana_register_portfolio_post_type() {

	//the labels that will be used for the portfolio items
	$labels = array(
		    'name' => _x('Portfolio', 'portfolio name', HANA_SHORTNAME),
		    'singular_name' => _x('Portfolio Item', 'portfolio type singular name', HANA_SHORTNAME),
		    'add_new' => _x('Add New', 'portfolio', HANA_SHORTNAME),
		    'add_new_item' => __('Add New Item', HANA_SHORTNAME),
		    'edit_item' => __('Edit Item', HANA_SHORTNAME),
		    'new_item' => __('New Portfolio Item', HANA_SHORTNAME),
		    'view_item' => __('View Item', HANA_SHORTNAME),
		    'search_items' => __('Search Portfolio Items', HANA_SHORTNAME),
		    'not_found' =>  __('No portfolio items found', HANA_SHORTNAME),
		    'not_found_in_trash' => __('No portfolio items found in Trash', HANA_SHORTNAME), 
		    'parent_item_colon' => ''
		    );

		    //register the custom post type
		    register_post_type( HANA_PORTFOLIO_POST_TYPE,
		    array( 'labels' => $labels,
	         'public' => true,  
	         'show_ui' => true,  
	         'capability_type' => 'post',  
	         'hierarchical' => false,  
			 'rewrite' => array('slug'=>'portfolio'),
			 'taxonomies' => array('portfolio_category', 'post_tag'),
	         'supports' => array('title', 'editor', 'thumbnail', 'comments', 'page-attributes') ) );


}


function hana_portfolio_columns($columns) {
	$columns['category'] = 'Portfolio Category';
	return $columns;
}

/**
 * Add category column to the portfolio items page
 * @param $name
 */
function hana_portfolio_show_columns($name) {
	global $post;
	switch ($name) {
		case 'category':
			$cats = get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' );
			echo $cats;
	}
}


/**
 * Builds the HTML code for a single portfolio item image - can be used in plugins or
 * other widgets that display a set of portfolio items
 * @param $post_id the ID of the post
 * @param $width the width that will be set to the image
 * @param $height the height that will be set to the image
 */
function hana_build_portfolio_image_html($post, $width, $height, $showTitle=false, $showDescription=false, $groupName='group'){
	$post_id=$post->ID;
	$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
	$preview = $thumbnail_src[0];

	$crop=get_post_meta($post->ID, 'crop_value', true);
	$thumbnail=hana_get_resized_image($thumbnail_src[0], $width, $height,$crop);

	$action=get_post_meta($post_id, 'action_value', true);
	$customlink=get_post_meta($post_id, 'custom_value', true);
	$description=get_post_meta($post_id, 'description_value', true);

	//set the link of the image depending on the action selected
	if($action=='nothing'){
		$openLink='';
		$closeLink='';
	}else if($action=='permalink'){
		$openLink='<a href="'.get_permalink($post_id).'">';
		$closeLink='</a>';
	}else if($action=='custom'){
		$openLink='<a href="'.$customlink.'" target="_blank">';
		$closeLink='</a>';
	}else{
		$preview=$action=='video'?$customlink:$preview;
		$rel=$groupName==''?'lightbox':'lightbox['.$groupName.']';
		$desc_title=$description?esc_attr($description):'';
		$openLink='<a rel="'.$rel.'" class="single_image" href="'.$preview.'" title="'.$desc_title.'">';
		$closeLink='</a>';
	}
	
	$title=$showTitle?'<h3>'.$post->post_title.'</h3>':'';
	$descHtml=($showDescription && $description)?'<p class="item-desc">'.$description.'</p>':'';
	if($showTitle || $showDescription) $title='<div class="portfolio-project-title">'.$title.$descHtml.'</div>';

	return $openLink.'<img src="'.$thumbnail.'" class="gallery-img" width="'.$width.'" height="'.$height.'" alt=""/>'.$title.$closeLink;
}
?>