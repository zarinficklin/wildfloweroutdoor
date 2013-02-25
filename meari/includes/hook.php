<?php

function meari_hide_admin_bar($content){ return ( is_admin()) ? $content : false; }
add_filter( 'show_admin_bar' , 'meari_hide_admin_bar');

function meari_product_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	if(is_admin() || get_post_type($post_id)!='product') return $html;
	$html = '';
	if(!$post_thumbnail_id)
		$post_thumbnail_id = get_post_thumbnail_id( $post_id );
	
	$image = meari_get_the_post_thumbnail_image_src( $post_id, $post_thumbnail_id, $size, $attr );
	
	if ( $image ) {
		list($src, $width, $height) = $image;
		$hwstring = image_hwstring($width, $height);
		if ( is_array($size) )
			$size = join('x', $size);
		$post = get_post($post_id);
		$default_attr = array(
			'src'	=> $src,
			'class'	=> "attachment-$size",
			'alt'	=> $post->post_title, // Use Alt field first
			'title'	=> '',
		);

		$attr = wp_parse_args($attr, $default_attr);
		$attr = apply_filters( 'post_thumbnail_image_attributes', $attr, $size, $post_id, $post_thumbnail_id );
		$attr = array_map( 'esc_attr', $attr );
		$html = rtrim("<img $hwstring");
		foreach ( $attr as $name => $value ) {
			$html .= ' '.$name.'="'.$value.'"';
		}
		$html .= ' />';
	}

	return $html;
}
add_filter( 'post_thumbnail_html', 'meari_product_thumbnail_html', 10, 5 );

