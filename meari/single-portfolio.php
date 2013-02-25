<?php get_header();?>

<?php 
	global $hana_page_options; 
	$hana_page_options['layout'] = "right"; ?>

<div id="content" class="<?php echo meari_content_class();?>">

<?php if ( have_posts() ) : the_post(); ?>
	<h2 class="portfolio-title"><?php the_title(); ?></h2>
    
    <div id="post-<?php the_ID(); ?>">
    	<?php the_post_thumbnail( 'blog-standard', array('class'=>'img-frame alignleft') );?>
    	<?php the_content(); ?>
    </div>    
<?php endif; ?>

</div>

<?php get_sidebar();?>

<?php get_footer();?>