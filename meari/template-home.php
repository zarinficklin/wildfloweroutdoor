<?php
/*
Template Name: Home Page
*/ 
get_header();?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
	
<?php 
	global $hana_post_meta;
	if($hana_post_meta['slogan']) echo '<div id="slogan">'.do_shortcode($hana_post_meta['slogan']).'</div>';
?>

<!-- START CONTENT -->
<div id="content" <?php post_class(meari_content_class()); ?>>

	<div id="post-<?php the_ID(); ?>">
    
		<?php the_content(); ?>
    
    </div>
    
</div>
<!-- END CONTENT -->
						
<?php endwhile; endif;?>

<?php get_sidebar();?> 

<?php get_footer(); ?>