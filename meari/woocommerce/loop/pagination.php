<?php
/**
 * Pagination
 */

global $wp_query;
?>

<?php if($wp_query->found_posts != 0):?>

<!-- start of pagination -->

<div class="heading-width-line"></div>
<div class="pager clearfix">

<?php if($wp_query->max_num_pages!=1):?>

<div class="page_numbers"><?php hana_print_pagination(); ?></div>

<?php 
	$paged = get_query_var( 'paged' );
	if ( !$paged )
		$paged = 1;
	$posts_per_page = intval( get_query_var( 'posts_per_page' ) );
?>

<p class="amount"><?php echo ($paged-1)*$posts_per_page+1;?> - <?php echo ($paged-1)*$posts_per_page+$wp_query->post_count;?> of <?php echo $wp_query->found_posts;?> Item(s)</p>

<?php else:?>

<p class="amount"><?php echo $wp_query->found_posts;?> Item(s)</p>

<?php endif;?>

</div>

<!-- end of pagination -->

<?php endif;?>