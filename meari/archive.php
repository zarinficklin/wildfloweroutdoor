<?php get_header();?>

<?php
	$blog_style = hana_get_opt('_blog_style');
	if($blog_style=='fluid') $hana_page_options['layout'] = 'full';
?>
<div class="blog-container <?php echo $blog_style;?>-blog">

    <div id="content" class="<?php echo ($blog_style!='fluid')?meari_content_class():'';?>">
    
        <?php 
		$blog_loop = array();
		$blog_loop['layout'] = $hana_page_options['layout'];
		$blog_loop['column'] = hana_get_opt('_blog_columns');
		
		get_template_part( 'loop', $blog_style );?>
        
    </div>
    
    <?php get_sidebar();?>

</div>

<?php get_footer();?>