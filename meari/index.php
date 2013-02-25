<?php
	global $hana_page_options;
	
	$hana_page_options = array(
		'layout'=>hana_get_opt('_blog_layout'),
		'sidebar'=>hana_get_opt('_blog_sidebar'),
		'slider'=>hana_get_opt('_blog_slider'),
		'static_image'=>hana_get_opt('_blog_static_image'),
		);
	if(!$hana_page_options['layout'] || !isset($hana_page_options['layout'])) $hana_page_options['layout']='right';
	
	$blog_style = hana_get_opt('_blog_style');
	if($blog_style=='fluid') $hana_page_options['layout'] = 'full';?>
    
<?php get_header();?>

<div class="blog-container" <?php echo $blog_style;?>-blog">

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