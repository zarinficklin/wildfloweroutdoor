<?php
/**
 * Content Wrappers
 */
?>
<!-- START SHOP CONTENT -->
<div id="content" class="shop-content">
	<?php if(is_tax('product_cat')):?>
	    <div class="grid_24"><?php woocommerce_category_image();?></div>
    <?php endif;?>
	<div class="<?php echo meari_content_class();?>">