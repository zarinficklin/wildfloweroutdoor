<?php
// remove logout link in main menu
remove_filter( 'wp_nav_menu_items', 'woocommerce_nav_menu_items', 10, 2 );

//catalog ordering
remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );
add_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering' );

//reset sale flash position
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 1);

//reset price position
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action( 'woocommerce_product_thumbnails', 'woocommerce_template_single_price', 10);


add_filter('loop_shop_per_page', 'meari_set_posts_per_page');
function meari_set_posts_per_page( $cols ) {               
    return hana_get_opt('_post_per_page_on_shop');
}

function woocommerce_output_related_products() {
	woocommerce_related_products( 5, 5  );
}

add_filter( 'woocommerce_available_variation', 'meari_update_available_variation_image_src', 10, 3);
function meari_update_available_variation_image_src($args, $product, $variation) {
	$attachment_id = get_post_thumbnail_id( $variation->get_variation_id() );
	if(!$attachment_id) return $args;
    $large_thumbnail_size = apply_filters('single_product_large_thumbnail_size', 'shop_single');
	$image_src = meari_get_the_post_thumbnail_image_src( null, $attachment_id, $large_thumbnail_size );
	$args['image_src'] = $image_src[0];
	return $args;
}

add_action( 'woocommerce_after_single_product_summary', 'meari_output_clear', 15);
function meari_output_clear() {
	echo '<div class="clearfix"></div>';
}

function woocommerce_category_image() {
	$term_slug = get_query_var('product_cat');
	$term = get_term_by('slug', $term_slug, 'product_cat');
	$thumbnail_id 	= get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
	if(!$thumbnail_id) {
		$ancestors = get_ancestors($term->term_id,'product_cat');
		foreach($ancestors as $ancestor) {
			$thumbnail_id = get_woocommerce_term_meta( $ancestor, 'thumbnail_id', true);
			if($thumbnail_id) break;
		}
	}
	if($thumbnail_id) {
		$src = wp_get_attachment_image_src( $thumbnail_id, 'full');
		echo '<div class="product-category-image"><p><img src="'.hana_get_resized_image($src[0],950,350).'" alt="" title="" /></p></div>';
	}
}

function meari_topcart() {
	global $woocommerce;
	
	// quantity
	$qty = 0;
	if (sizeof($woocommerce->cart->get_cart())>0) : foreach ($woocommerce->cart->get_cart() as $item_id => $values) :
	
		$qty += $values['quantity'];
	
	endforeach; endif;
	
	if ( $qty == 0 )
		$label = '';
	elseif ( $qty == 1 )
	    $label = $qty . ' ' . __( 'item', 'meari' );
	else             
	    $label = $qty . ' ' . __( 'items', 'meari' );
    
    echo '<a class="widget_shopping_cart trigger" href="' . $woocommerce->cart->get_cart_url() . '"><img src="'.MEARI_IMAGE_URL.'cart_icon_small.png" /><span>'.$label.'</span></a>';
}

add_action('wp_head', 'meari_set_shop_style');
function meari_set_shop_style() {
	global $woocommerce;
	$catalog_width = $woocommerce->get_image_size('shop_catalog_image_width');
	$catalog_height = $woocommerce->get_image_size('shop_catalog_image_height');
	$template_url = get_template_directory_uri();
	if(function_exists('get_blogaddress_by_id') && strpos(get_site_url(),get_site_url(1))!==false)
		$template_url = str_replace(get_site_url(), get_site_url(1), $template_url);
	$pie_url = parse_url($template_url, PHP_URL_PATH).'/woocommerce/PIE.htc';
?>
<style>
	.products li .product-image { height: <?php echo $catalog_height;?>px;}
	@media only screen and (max-width: 767px) {
	.products li .product-image { height: <?php echo $catalog_height*127/$catalog_width;?>px;}
	}
	.products li .product-details { width: <?php echo $catalog_width;?>px;}
	.products li { width: <?php echo ($catalog_width+8);?>px;}
	.carousel-products .jcarousel-prev, .carousel-products .jcarousel-next { top: <?php echo ($catalog_height/2-22);?>px;}
	div.product div.images p.price, ul.products li.modern .price, .productslider-wrapper .price, ul.products li.modern .product-box-wrapper { behavior: url(<?php echo $pie_url;?>);}
</style>
<?php
}

add_action('wp_head', 'meari_set_single_product_style');
function meari_set_single_product_style() {
	if(is_admin() || get_post_type()!='product' || !is_single()) return;
	
	global $woocommerce;
	
	$product_tabs_position = hana_get_opt('_product_tabs_position');
	$related_product_display = hana_get_opt('_related_product_display');
	if($product_tabs_position=='below_summary') {
		remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
		add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60);
	}
	if($related_product_display=='off')
		remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
		
	$single_width = $woocommerce->get_image_size('shop_single_image_width');
?>
<style>
	div.product div.images { width: <?php echo $single_width+14;?>px;}
	div.product div.summary { width: <?php echo ((meari_get_layout()=='full')?916:676)-$single_width;?>px;}
	@media only screen and (min-width: 768px) and (max-width: 959px) {
		div.product div.images { width: <?php echo ($single_width+14)*0.8;?>px;}
		div.product div.summary { width: <?php echo (((meari_get_layout()=='full')?916:676)-$single_width)*0.8;?>px;}
	}
</style>
<?php 
}



/* --------- ShortCode -------- */

add_shortcode('bestseller_products', 'meari_bestseller_products');
/**
 * Output best seller products
 **/
function meari_bestseller_products( $atts ) {
	
	global $woocommerce, $woocommerce_loop;
	
	extract(shortcode_atts(array(
		'per_page' 	=> '12',
		'columns' 	=> '4',
		'orderby' => 'date',
		'order' => 'desc'
	), $atts));
	
	$args = array(
		'post_type'	=> 'product',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
		'posts_per_page' => $per_page,
		'meta_key' 		=> 'total_sales',
		'orderby' 		=> 'meta_value'
	);

	ob_start();
	
	if ( version_compare($woocommerce->version, '1.6.0') >= 0 ) :	// if version is larger than 1.6

	$products = new WP_Query( $args );
	
	$woocommerce_loop['columns'] = $columns;

	if ( $products->have_posts() ) : ?>
		
		<ul class="products">
			
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
		
				<?php woocommerce_get_template_part( 'content', 'product' ); ?>
	
			<?php endwhile; // end of the loop. ?>
				
		</ul>
        
        
        
    <?php endif;

	wp_reset_query();
	
	else :	// if version is less than 1.6
	
	query_posts($args);
	woocommerce_get_template_part( 'loop', 'shop' );
	wp_reset_query();
	
	endif;
	
	return ob_get_clean();
}

add_shortcode("carousel_products", "meari_carousel_products");
function meari_carousel_products($atts, $content = null) { 
	global $woocommerce, $woocommerce_loop, $meari_slider_count;
	if(!$meari_slider_count) $meari_slider_count=1;
	
	$defaults = array(
		'visible' => 4,
		'step' => 1,
		'interval' => 3000
	);
	
	$atts = wp_parse_args($atts, $defaults);
	$autoplay = (isset($atts['autoplay']))?true:false;
	$id = "product_slider_".$meari_slider_count;
	
	$woocommerce_loop['setGrid'] = 1;
	$html = '<div id="'.$id.'" class="carousel-products"><div class="carousel-products-inner">'.do_shortcode(trim($content)).'</div></div>';
	$html .= "
    <script type=\"text/javascript\">
	jQuery(function($){	
		jQuery('#".$id." ul').jcarousel({
			scroll: ".$atts['step'].",
			auto: ".($autoplay?$atts['interval']/1000:0).",
        	wrap: 'last',
			initCallback: function(carousel){				
				jQuery('#".$id."').hanaResizeProductCarousel({visible: ".$atts['visible']."});
				carousel.clip.hover(function() {
					carousel.stopAuto();
				}, function() {
					carousel.startAuto();
				});
			},
		});
	});
	</script>"; 
	unset($woocommerce_loop['setGrid']);
	$meari_slider_count++;
	return $html;
}
