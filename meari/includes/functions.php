<?php

function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}

function print_excerpt($length) { // Max excerpt length. Length is set in characters
	global $post;
	$text = $post->post_excerpt;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
	}
	$text = strip_shortcodes($text); // optional, recommended
	$text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags

	$text = substr($text,0,$length);
	$excerpt = reverse_strrchr($text, '.', 1) . ' ...';
	if( $excerpt ) {
		echo apply_filters('the_excerpt',$excerpt);
	} else {
		echo apply_filters('the_excerpt',$text);
	}
}

// Returns the portion of haystack which goes until the last occurrence of needle
function reverse_strrchr($haystack, $needle, $trail) {
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}

function meari_get_template($template_name) {
	locate_template( 'includes/templates/'.$template_name, true, false );
}

function meari_get_term_ancestors($term, $taxonomy, $ancestors = array()) {
    // Accept the category object or the category's ID
    $term = (is_object($term)) ? get_term($term->term_id,$taxonomy) : (is_numeric($term)) ? get_term($term,$taxonomy) : FALSE;

    // If there the category has a parent...
    if (isset($term->parent))
    {
        // Add the category object to the array
        array_unshift($ancestors, $term);
 
        // If parent category ID is 0, don't iterate again
        if ($term->parent != 0)
            $ancestors = meari_get_term_ancestors($term->parent, $taxonomy, $ancestors);
    }
 
    return $ancestors;
}

function meari_get_the_post_thumbnail_image_src( $post_id = null, $post_thumbnail_id = null, $size = 'post-thumbnail', $attr = '' ) {
	if($post_id === null) $post_id = get_the_ID();
	
	$size_org = $size;	
	global $_wp_additional_image_sizes;
	if(!is_array($size) && array_key_exists($size,$_wp_additional_image_sizes))
	{
		$size = array($_wp_additional_image_sizes[$size]['width'],$_wp_additional_image_sizes[$size]['height']);
	}
	
	$thumbnail_image_src = wp_get_attachment_image_src( $post_thumbnail_id, $size );
	$full_image_src =  wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
		
	if(!is_array($size))
		return $thumbnail_image_src;
	
	$width = $size[0];
	$height = $size[1];
	
	if( $thumbnail_image_src[1] == $width && $thumbnail_image_src[2] == $height )
		return $thumbnail_image_src;
	
	if(!$thumbnail_image_src[0]) return;
	
	$cropPosition = get_post_meta($post_id, 'crop', true) ? get_post_meta($post_id, 'crop', true) : '';
	$new_thumb = hana_get_resized_image($full_image_src[0],$width,$height,$cropPosition);
	
	return array($new_thumb,$width,$height);
}

/**
 * Add the paragraphs to the string, without damage the shortcodes
 * 
 * @param string $str The string to convert
 * @return string The string converted   
 * 
 * @since 1.0                
 */  
function meari_addp($str) 
{
    $str = wpautop( $str );
    $str = preg_replace( '/<\/?p>(\[(.*)\])<\/?p>/', '$1', $str );    // <p>[sc]</p>
    $str = preg_replace( '/(\[(.*)\])[ ]*<\/?p>/', '$1', $str );       // [/sc]</p>
    $str = preg_replace( '/(\[(.*)\])<br \/>/', '$1', $str );     // [/sc]<br />
    $str = preg_replace( '/<\/?p>(\[(.*))/', '$1', $str );           // <p>[sc
    $str = preg_replace( '/(=")<br \/>\n/', '$1', $str );           // ="<br />
    $str = preg_replace( '/\n<\/?p>(")/', '$1', $str );           // <p>" 
    $str = do_shortcode( $str );
    
    return apply_filters( 'meari_addp', $str );
}

function meari_get_layout() {
	global $hana_page_options;
	if($hana_page_options['layout']=='') $hana_page_options['layout']='full';
	return $hana_page_options['layout'];
}

function meari_content_class() {
	$layout = meari_get_layout();
	switch($layout) {
		case 'full':
			$class = 'grid_24 full-width';
			break;
		case 'left':
			$class = 'grid_18 alignright';
			break;
		case 'right':
			$class = 'grid_18 alignleft';
			break;
	}
	return $class;
}