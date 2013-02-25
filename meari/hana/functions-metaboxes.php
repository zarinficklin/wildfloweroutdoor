<?php
/**
 * Metaboxes
 * 
 * Main functions for the metaboxes manage.     
 * 
 * @author Hana
 */

$hana_metabox_manager = new Hana_MetaBox_Manager();
 
/**
 * Add a meta box to an edit form.
 *
 * @param string $id String for use in the 'id' attribute of tags.
 * @param string $title Title of the meta box.
 * @param string $page The type of edit page on which to show the box (post, page, link).             
 * @param array $options_args All options to add into the metabox.
 * @param string $context The context within the page where the boxes should show ('normal', 'advanced').
 * @param string $priority The priority within the context where the boxes should show ('high', 'low').
 */
function hana_register_metabox( $id, $title, $page, $options, $context = 'advanced', $priority = 'default' ) {
	global $hana_metabox_manager;
	$hana_metabox_manager->register_metabox($id,$title,$page,$options,$context,$priority);
}

/**
 * Get metaboxes
 */
function hana_get_metaboxes() {
	global $hana_metabox_manager;
	return $hana_metabox_manager->get_metaboxes();
}

/**
 * Returns the saved meta data for a page of each of the given keys.
 * @param int $page_id the ID of the page to retrieve the meta data
 * @param array $keys an array containing all the keys whose values will be retrieved
 */
function hana_get_post_meta($post_id, $keys) {	
	global $hana_metabox_manager;
	return $hana_metabox_manager->get_post_meta($post_id,$keys);
}




function hana_show_hidden_metaboxes( $hidden, $screen ) {
	# make custom fields and excerpt meta boxes show by default
	if ( 'post' == $screen->base || 'page' == $screen->base )
		$hidden = array('slugdiv', 'trackbacksdiv', 'commentstatusdiv', 'commentsdiv', 'authordiv', 'revisionsdiv');
		
	return $hidden;
}
add_filter( 'default_hidden_meta_boxes', 'hana_show_hidden_metaboxes', 10, 2 );
