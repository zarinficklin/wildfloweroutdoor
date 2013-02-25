<?php

global $portfolio_loop;

echo '<!-- START PORTFOLIO LOOP -->';

if (!isset($portfolio_loop['columns']) || !$portfolio_loop['columns']) $portfolio_loop['columns'] = apply_filters('loop_portfolio_columns', 4);
switch($portfolio_loop['columns']) {
	case '2':
		$porfolio_loop['column_width'] = '470'; break;
	case '3':
		$porfolio_loop['column_width'] = '310'; break;
	case '4':
		$porfolio_loop['column_width'] = '230'; break;
		
}
$portfolio_loop['loop']=0;

if( have_posts() ) : while ( have_posts() ) : the_post();

	global $hana_post_meta, $post;
	
	$portfolio_loop['loop']++;

    $loop_class_li = array('portfolio-item', 'img-loading');
	
	if ( $portfolio_loop['setLast'] && $portfolio_loop['loop'] % $portfolio_loop['columns'] ==0 )
        $loop_class_li[] = 'last';      
        
    if ( $portfolio_loop['setFirst'] && ( $portfolio_loop['loop'] - 1 ) % $portfolio_loop['columns'] == 0 )
        $loop_class_li[] = 'first';
	
		
	//get the category IDs to which the items belong and generate a string
	//containing them, separated by commas, for example: 1,2,3
	$terms=wp_get_post_terms($post->ID, 'portfolio_category');
	$term_string='';
	foreach($terms as $term){
		$term_string.=($term->term_id).',';
	}
	$term_string=substr($term_string, 0, strlen($term_string)-1);
	
	if ( ! empty( $loop_class_li ) )
        $class = ' class="' . implode( ' ', $loop_class_li ) . '"';
    else
        $class = '';
		
	?>
    <div<?php echo $class; ?> data-category="<?php echo $term_string;?>">
    	<div class="relative">
        	<?php echo hana_build_portfolio_image_html($post, $porfolio_loop['column_width'], $portfolio_loop['item_height'], $portfolio_loop['show_titles'], $portfolio_loop['showdesc'], 'gallery');?>
        </div>
    </div>
    <?php
	
endwhile; endif;

echo '<!-- END PORTFOLIO LOOP -->';