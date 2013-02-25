<?php
/**
 * Front Hooks
 *
 * Main functionality for the front-end manage.  
 * 
 * @author Hana
 */
 

add_filter('body_class','hana_browser_body_class');
function hana_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}


function hana_head_addons(){	
	//prints the theme name, version in meta tag
	global $wp_version;
	if(version_compare($wp_version, '3.4.0')>=0) {
		$theme_info = wp_get_theme();
		echo '<meta content="' . esc_attr( $theme_info->Name . ' v.' . $theme_info->Version ) . '" name="generator"/>';
	}
}
add_action('wp_head','hana_head_addons',7);


/**
 * Prints all the scripts that have been added to the global $hana_scripts_to_print variable.
 */
function hana_print_additional_scripts_styles() {
    global $hana_data; 
    if(!empty($hana_data->scripts_to_print)) foreach($hana_data->scripts_to_print as $script){
    	wp_print_scripts($script);
    }
    if(!empty($hana_data->styles_to_print)) foreach($hana_data->styles_to_print as $style){
    	wp_print_styles($style);
    }
}
add_action('wp_footer', 'hana_print_additional_scripts_styles');


function hana_blog_query( $query ) {
	global $post;

	if( is_admin() || (!is_archive() && !is_search()) || $post->post_type == 'product' ) return $query;
	
	if ( !$query->get( 'posts_per_page' ) && hana_get_opt('_post_per_page_on_blog') ) 	
		$query->set( 'posts_per_page', hana_get_opt('_post_per_page_on_blog') );
			
	$excludeCat=explode(',',hana_get_opt('_exclude_cat_from_blog'));
	if ( !$query->get( 'category__not_in') && !empty($excludeCat))
		$query->set( 'category__not_in', $excludeCat);
	
	return $query;
}
add_action( 'pre_get_posts', 'hana_blog_query',11 );


/**
 * Load page template options
 */
add_action( 'get_header', 'hana_load_page_options');
function hana_load_page_options() {
	global $hana_page_options, $post;
	if(!is_page() || !$post->ID) return;
	
	$hana_page_options=hana_get_post_meta($post->ID, array('slider','layout','sidebar', 'show_title','static_image'));
	if($hana_page_options['show_title']=='global') $hana_page_options['show_title']=hana_get_opt('_show_page_title');
}


/**
 * Load blog page options
 */
add_action( 'get_header', 'hana_load_blog_page_options');
function hana_load_blog_page_options() {
	global $hana_page_options, $post;
	if(!is_archive() && !is_search() && !(is_single() && $post->post_type=='post')) return;
	if($post->post_type!='post') return;
	
	if(is_single())
		$hana_page_options = array(
			'layout'=>hana_get_opt('_single_post_layout'),
			'sidebar'=>hana_get_opt('_single_post_sidebar')
		);
	else
		$hana_page_options = array(
			'layout'=>hana_get_opt('_blog_layout'),
			'sidebar'=>hana_get_opt('_blog_sidebar'),
			'slider'=>hana_get_opt('_blog_slider'),
			'static_image'=>hana_get_opt('_blog_static_image'),
		);
	if(!$hana_page_options['layout'] || !isset($hana_page_options['layout'])) $hana_page_options['layout']='right';
}


/**
 * Load shop page options
 */
add_action( 'get_header', 'hana_load_shop_page_options');
function hana_load_shop_page_options() {
	global $hana_page_options, $post;
	
	if(!is_archive() && !is_search() && !is_single()) return;
	if($post->post_type!='product' && !(isset($_REQUEST['post_type']) && $_REQUEST['post_type']=='product')) return;
	
	if(is_single())
		$hana_page_options = array(
			'layout'=>hana_get_opt('_single_product_layout'),
			'sidebar'=>hana_get_opt('_single_product_sidebar')
		);
	else
		$hana_page_options = array(
			'layout'=>hana_get_opt('_shop_layout'),
			'sidebar'=>hana_get_opt('_shop_sidebar'),
			'slider'=>hana_get_opt('_shop_slider'),
			'static_image'=>hana_get_opt('_shop_static_image'),
		);
	if(!$hana_page_options['layout'] || !isset($hana_page_options['layout'])) $hana_page_options['layout']='right';
}
?>