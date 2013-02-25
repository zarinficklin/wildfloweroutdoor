<?php

global $woocommerce_loop, $wp_query;

if ( get_post_type() != 'product' ) remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering' ); 

echo '<!-- start of shop loop -->';

do_action('woocommerce_before_shop_loop');

$woocommerce_loop['loop'] = 0;
$woocommerce_loop['show_products'] = true;

if (!isset($woocommerce_loop['border_display']) || !$woocommerce_loop['border_display']) $woocommerce_loop['border_display'] = hana_get_opt('_product_border');
if (!isset($woocommerce_loop['name_display']) || !$woocommerce_loop['name_display']) $woocommerce_loop['name_display'] = hana_get_opt('_product_name');
if (!isset($woocommerce_loop['price_display']) || !$woocommerce_loop['price_display']) $woocommerce_loop['price_display'] = hana_get_opt('_product_price');
if (!isset($woocommerce_loop['buttons_display']) || !$woocommerce_loop['buttons_display']) $woocommerce_loop['buttons_display'] = hana_get_opt('_product_buttons');
if (!isset($woocommerce_loop['style']) || !$woocommerce_loop['style']) $woocommerce_loop['style'] = hana_get_opt('_product_style');
$product_columns = intval(hana_get_opt('_product_columns')); if($product_columns<=0) $product_columns = 4;
if (!isset($woocommerce_loop['columns']) || !$woocommerce_loop['columns']) $woocommerce_loop['columns'] = apply_filters('loop_shop_columns', $product_columns);

$style = array();
$style[]='grid';
$style[]=$woocommerce_loop['style'];
if($woocommerce_loop['border_display']!==false && $woocommerce_loop['border_display'] != 'off') $style[]="border";
if(!$woocommerce_loop['name_display'] || $woocommerce_loop['name_display'] == 'off') $style[]="hide-name";
if(!$woocommerce_loop['price_display'] || $woocommerce_loop['price_display'] == 'off') $style[]="hide-price";
if(!$woocommerce_loop['buttons_display'] || $woocommerce_loop['buttons_display'] == 'off') $style[]="hide-buttons";
	
ob_start();

if ($woocommerce_loop['show_products'] && have_posts()) : while (have_posts()) : the_post(); 
	
	global $product;
	
	if (!$product->is_visible()) continue; 
	
	$woocommerce_loop['loop']++;

    $loop_class_li = $style;
    
    if ( ! isset( $woocommerce_loop['setGrid'] ) && ! isset( $woocommerce_loop['setLast'] ) && $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ==0 )
        $loop_class_li[] = 'last';      
        
    if ( ! isset( $woocommerce_loop['setGrid'] ) && ! isset( $woocommerce_loop['setFirst'] ) && ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
        $loop_class_li[] = 'first';                 
        
    if ( ! empty( $loop_class_li ) )
        $class = ' class="' . implode( ' ', $loop_class_li ) . '"';
    else
        $class = '';
	
	?>
	<li<?php echo $class; ?>>
    
    	<div class="product-box-wrapper"><div class="product-box">
	
			<?php do_action('woocommerce_before_shop_loop_item'); ?>
                
            <a href="<?php the_permalink(); ?>" class="product-image">
                
                <?php do_action('woocommerce_before_shop_loop_item_title'); ?>
            
            </a>
            
            <div class="product-details">
                        
                <a href="<?php the_permalink(); ?>" class="product-name" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    
                <?php do_action('woocommerce_after_shop_loop_item_title'); ?>
                
                <?php do_action('woocommerce_after_shop_loop_item'); ?>
                
            </div>
        
        </div></div>
		
	</li>
	
	<?php if( ! isset( $woocommerce_loop['setGrid'] ) && $woocommerce_loop['loop']%$woocommerce_loop['columns']==0 ):?>
    <div class="gridbreaker"><!-- --></div>
    <?php endif;
	
endwhile; endif; 

if ($woocommerce_loop['loop']==0) :

	echo '<p class="info" style="margin-top: 30px;">'.__('No products found which match your selection.', 'meari').'</p>'; 
	
else :
	
	$found_posts = ob_get_clean();

	echo '<ul class="products">' . $found_posts . '</ul>';   
	
endif;                                    

do_action('woocommerce_after_shop_loop');

$woocommerce_loop = array();

echo '<!-- end of shop loop -->';  