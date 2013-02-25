<?php
/*
Template Name: Archives Page
*/
get_header(); ?> 

<!-- START CONTENT -->
<div id="content">
    
    <?php if ( have_posts() ) : 

	    while ( have_posts() ) : the_post();
		
			if($hana_page_options['show_title']!='off')
				the_title( '<h1 class="page-title">', '</h1>' );     
			?>	
			
            <div id="post-<?php the_ID(); ?>" <?php post_class(meari_content_class()); ?>>
            
				<?php	the_content();?>
                
                <h4><?php echo hana_get_text('_last_posts_text');?></h4>
                <div class="heading-width-line"></div>
                <ul class="bullet_arrow imglist">
                    <?php wp_get_archives('type=postbypost','30'); ?>
                </ul>
                <br />
                <h4><?php echo hana_get_text('_archives_by_month_text');?></h4>
                <div class="heading-width-line"></div>
                <ul class="bullet_arrow imglist">
                    <?php wp_get_archives('type=monthly'); ?>
                </ul>
                <br />
                <h4><?php echo hana_get_text('_archives_by_subject_text');?></h4>
                <div class="heading-width-line"></div>
                <ul class="bullet_arrow imglist">
                    <?php wp_list_categories('title_li='); ?>
                </ul>
                
			</div><?php
		
		endwhile; 
	
	endif;?>     
    
</div>
<!-- END CONTENT -->

<?php get_sidebar();?>

<?php get_footer();?>
