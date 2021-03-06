<?php
/**
 * The template for displaying product content within loops.
 *
 * @package WooCommerce
 * @since WooCommerce 1.6
 */
 
global $product, $woocommerce_loop;

// Ensure visibilty
if ( ! $product->is_visible() ) 
	return; 
	
// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) 
	$woocommerce_loop['loop'] = 0;

// Increase loop count
$woocommerce_loop['loop']++;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) 
{
	$product_columns = intval(hana_get_opt('_product_columns')); if($product_columns<=0) $product_columns = 4;
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $product_columns );
}

if ( empty( $woocommerce_loop['border_display'] ) )	$woocommerce_loop['border_display'] = hana_get_opt('_product_border');
if ( empty( $woocommerce_loop['name_display'] ) ) $woocommerce_loop['name_display'] = hana_get_opt('_product_name');
if ( empty( $woocommerce_loop['price_display'] ) ) $woocommerce_loop['price_display'] = hana_get_opt('_product_price');
if ( empty( $woocommerce_loop['buttons_display'] ) ) $woocommerce_loop['buttons_display'] = hana_get_opt('_product_buttons');
if ( empty( $woocommerce_loop['style'] ) ) $woocommerce_loop['style'] = hana_get_opt('_product_style');

$style = array();
$style[]='grid';
$style[]=$woocommerce_loop['style'];
if ( $woocommerce_loop['border_display']!==false && $woocommerce_loop['border_display'] != 'off' ) $style[]="border";
if ( !$woocommerce_loop['name_display'] || $woocommerce_loop['name_display'] == 'off' ) $style[]="hide-name";
if ( !$woocommerce_loop['price_display'] || $woocommerce_loop['price_display'] == 'off' ) $style[]="hide-price";
if ( !$woocommerce_loop['buttons_display'] || $woocommerce_loop['buttons_display'] == 'off' ) $style[]="hide-buttons";
if ( ! isset( $woocommerce_loop['setGrid'] ) && ! isset( $woocommerce_loop['setLast'] ) && $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 ) $style[]='last'; 
if ( ! isset( $woocommerce_loop['setGrid'] ) && ! isset( $woocommerce_loop['setFirst'] ) && ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 ) $style[]='first';
?>
<li class="product <?php echo implode(' ',$style);?>">

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

<?php if ( ! isset( $woocommerce_loop['setGrid'] ) && $woocommerce_loop['loop'] % $woocommerce_loop['columns']==0 ):?>
<div class="gridbreaker"><!-- --></div>
<?php endif;?>