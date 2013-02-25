<?php
/**
 * General
 *
 * General functions for the framework.
 *   
 * @author Hana
 */


/**
 * Converts a name that consists of more words and different characters to a class (id).
 * @param $name the name to convert
 */
function convert_to_class($name){
	return strtolower(str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name));
}


function in_subcat($blogcat,$current_cat='') {
	$in_subcategory = false;
	
	if (cat_is_ancestor_of($blogcat,$current_cat) || $blogcat == $current_cat) $in_subcategory = true;
		
    return $in_subcategory;
}



/*this function gets page name by its id*/
function get_pagename($page_id)
{
	global $wpdb;
	$page_name = $wpdb->get_var("SELECT post_title FROM $wpdb->posts WHERE ID = '".$page_id."' AND post_type = 'page'");
	return $page_name;
}


/*this function gets category name by its id*/
function get_categname($cat_id)
{
	global $wpdb;
	$cat_name = $wpdb->get_var("SELECT name FROM $wpdb->terms WHERE term_id = '".$cat_id."'");
	return $cat_name;
}


/*this function gets category id by its name*/
function get_catId($cat_name)
{
	$cat_name_id = get_cat_ID( stripslashes($cat_name) );
	return $cat_name_id;
}


/*this function gets page id by its name*/
function get_pageId($page_name)
{
	global $wpdb;
	$page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '".stripslashes($page_name)."' AND post_type = 'page'");
	
	//fix for qtranslate plugin
	if ( $page_name_id == '' ) $page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title LIKE '%".trim($page_name)."%' AND post_type = 'page'");

	return $page_name_id;
}


/**
 * Gets a list of custom taxomomies by slug
 * @param $term_id the slug
 */
function get_taxonomy_slug($term_id){
	global $wpdb;

	$res = $wpdb->get_results($wpdb->prepare("SELECT slug FROM $wpdb->terms WHERE term_id=%s LIMIT 1;", $term_id));
	$res=$res[0];
	return $res->slug;
}
?>