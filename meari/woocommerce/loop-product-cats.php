<?php 

global $woocommerce, $woocommerce_loop, $product_category_found; 

$product_category_found = false;

if (!isset($woocommerce_loop['border_display']) || !$woocommerce_loop['border_display']) $woocommerce_loop['border_display'] = hana_get_opt('_product_border');
if (!isset($woocommerce_loop['name_display']) || !$woocommerce_loop['name_display']) $woocommerce_loop['name_display'] = hana_get_opt('_product_name');
if (!isset($woocommerce_loop['style']) || !$woocommerce_loop['style']) $woocommerce_loop['style'] = hana_get_opt('_product_style');
$product_columns = intval(hana_get_opt('_product_columns')); if($product_columns<=0) $product_columns = 4;
if (!isset($woocommerce_loop['columns']) || !$woocommerce_loop['columns']) $woocommerce_loop['columns'] = apply_filters('loop_shop_columns', $product_columns);

$style = array();
$style[]='grid';
$style[]=$woocommerce_loop['style'];
if($woocommerce_loop['border_display']!==false && $woocommerce_loop['border_display'] != 'off') $style[]="border";
if(!$woocommerce_loop['name_display'] || $woocommerce_loop['name_display'] == 'off') $style[]="hide-name";

?>

<?php 
if(!empty($product_categories)) : foreach ($product_categories as $category) :

	if ($category->parent != $product_category_parent) continue;

	$product_category_found = true;

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
	<li class="product sub-category <?php echo $class; ?>">
    
    	<div class="product-box-wrapper"><div class="product-box">

			<?php do_action('woocommerce_before_subcategory', $category); ?>
		
			<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" class="product-image">
    
                <?php do_action('woocommerce_before_subcategory_title', $category); ?>
	
			</a>
        
        	<div class="product-details">
            
            	<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" class="product-name" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a>
    
                <?php do_action('woocommerce_after_subcategory_title', $category); ?>

				<?php do_action('woocommerce_after_subcategory', $category); ?>
                
        	</div>
        
        </div></div>

	</li>
	
	<?php if( ! isset( $woocommerce_loop['setGrid'] ) && $woocommerce_loop['loop']%$woocommerce_loop['columns']==0 ):?>
    <div class="gridbreaker"><!-- --></div>
    <?php endif;

endforeach; endif;
?>