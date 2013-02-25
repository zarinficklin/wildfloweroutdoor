<?php

define('HEADER_IMAGE', trailingslashit( get_stylesheet_directory_uri() ).'images/logo.png');
define('MEARI_CONTENT_WIDTH',710);

if ( ! isset( $content_width ) )
	$content_width = MEARI_CONTENT_WIDTH;       

/** Tell WordPress to run meari_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'meari_setup' );

if ( ! function_exists( 'meari_setup' ) ):

function meari_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.	
	register_nav_menus( array(
		'top-menu' => __( 'Top Navigation', HANA_SHORTNAME ),
	) );	
	register_nav_menus( array(
		'main-menu' => __( 'Main Navigation', HANA_SHORTNAME ),
	) );
	
	add_image_size('blog-standard', 490, 0);
	add_image_size('blog-column-3', 280, 0);
	add_image_size('blog-column-4', 200, 0);
	add_image_size('blog-column-6', 120, 0);
}

endif;


function meari_register_sidebars() {
	
	$footer_sidebars = array(array('name'=>'Footer First Column', 'id'=>'footer-first'),
	array('name'=>'Footer Second Column', 'id'=>'footer-second'),
	array('name'=>'Footer Third Column', 'id'=>'footer-third'),
	array('name'=>'Footer Fourth Column', 'id'=>'footer-fourth'));
	
	foreach($footer_sidebars as $sidebar) {
		register_sidebar(array('name'=>$sidebar['name'],
			'id' => $sidebar['id'],
			'before_widget' => '<div class="widget footer-widget %2$s" id="%1$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2><hr/>',
		));
	}
}
add_action('widgets_init', 'meari_register_sidebars', 30);

?>