<?php
/*
Template Name: Blog Page
*/ 
get_header();?>

<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	
	$blog_style = $hana_post_meta['blog_style'];
	if($blog_style=='fluid') $hana_page_options['layout'] = 'full';
?>
<div class="blog-container <?php echo $blog_style;?>-blog">

    <div id="content" class="<?php echo ($blog_style!='fluid')?meari_content_class():'';?>">
    
    	<?php
		//query posts
		$postsPerPage=hana_get_opt('_post_per_page_on_blog')==''?5:hana_get_opt('_post_per_page_on_blog');
		$excludeCat=explode(',',hana_get_opt('_exclude_cat_from_blog'));
		query_posts(array(
			'category__not_in' => $excludeCat,
			'paged' => get_query_var('paged'),
			'posts_per_page' => hana_get_opt('_post_per_page_on_blog')
		));
    
		$blog_loop = array();
		$blog_loop['layout'] = $hana_page_options['layout'];
		$blog_loop['column'] = $hana_post_meta['blogcolumn'];
		
        get_template_part( 'loop', $blog_style );
		
        wp_reset_query();?>
        
    </div>
    
    <?php get_sidebar();?>

</div><?php
		
endwhile; endif;?>    

<?php get_footer(); ?>