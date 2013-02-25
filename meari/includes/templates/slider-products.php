<?php
$count=hana_get_opt('_products_count');
$by=hana_get_opt('_products_by');
$image_height=hana_get_opt('_products_image_height');
$interval=hana_get_opt('_products_interval');
$autoplay=hana_get_opt('_products_autoplay')=='on'?true:false;

remove_action( 'woocommerce_product_thumbnails', 'woocommerce_template_single_price', 10);

switch($by) {
case 'featured':
	$args = array(
		'post_type'	=> 'product',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
		'posts_per_page' => $count,
		'orderby' => 'date',
		'order' => 'desc',
		'meta_query' => array(
			array(
				'key' => '_visibility',
				'value' => array('catalog', 'visible'),
				'compare' => 'IN'
			),
			array(
				'key' => '_featured',
				'value' => 'yes'
			)
		)
	);
	break;
case 'best_seller':
	$args = array(
		'post_type'	=> 'product',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
		'posts_per_page' => $count,
		'meta_key' 		=> 'total_sales',
		'orderby' 		=> 'meta_value'
	);
	break;
default:
	$args = array(
		'post_type'	=> 'product',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
		'posts_per_page' => $count,
		'orderby' => 'date',
		'order' => 'desc',
		'meta_query' => array(
			array(
				'key' => '_visibility',
				'value' => array('catalog', 'visible'),
				'compare' => 'IN'
			)
		)
	);
}

query_posts($args);
if(have_posts()):
?>

<style>
.ca-icon {height: <?php echo $image_height;?>px;}
.ca-container {height: <?php echo $image_height+140;?>px;}
.ca-content-wrapper {height: <?php echo $image_height+130;?>px;}
</style>

<div id="slider-container" class="with-margin">
    <div id="ca-container" class="ca-container">
        <div class="ca-wrapper">
        <?php while(have_posts()): the_post();?>
        	<?php
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
				$thumb_path = hana_get_resized_image($image[0], 270, $image_height);
			?>
        	<div class="ca-item product">
                <div class="ca-item-main">
                    <div class="ca-icon" style="background-image:url(<?php echo $thumb_path;?>)">
                    	<?php woocommerce_show_product_loop_sale_flash();?>
                    	<?php woocommerce_template_loop_price();?>
                    </div>                    
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    
                    <?php do_action('woocommerce_product_thumbnails'); ?>
                    <a href="#" class="ca-more">more...</a>
                </div>
                <div class="ca-content-wrapper">
                    <div class="ca-content">
                    	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        <a href="#" class="ca-close">close</a>

                        <div class="ca-content-text show-screen">
                            <?php print_excerpt(1000);?>
                        </div>
                        <div class="ca-content-text hide-screen">
                            <?php print_excerpt(300);?>
                        </div>
                        <div class="buttons">
                        <?php woocommerce_template_loop_add_to_cart();?>
                        <a href="<?php the_permalink(); ?>" class="button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
        </div>
    </div>
            
	<script type="text/javascript">
        jQuery(document).ready(function($){
            $('#ca-container').contentcarousel({autoplay: <?php echo ($autoplay)?$interval:0;?>});
        });
    </script>
</div>
<?php endif;
wp_reset_query();

add_action( 'woocommerce_product_thumbnails', 'woocommerce_template_single_price', 10);?>

