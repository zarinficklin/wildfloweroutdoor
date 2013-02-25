<?php get_header();?>

<!-- START CONTENT -->
<div id="content">
    
    <?php if ( have_posts() ) : 

	    while ( have_posts() ) : the_post();
		
			if($hana_page_options['show_title']!='off')
				the_title( '<h1 class="page-title">', '</h1>' );     
			?>	
			
			<div id="post-<?php the_ID(); ?>" <?php post_class(meari_content_class()); ?>>
            
				<?php	the_content();?>
                
   				<?php if(hana_get_opt('_page_comments')!='off'){comments_template();}?>
                
			</div><?php
		
		endwhile; 
	
	endif;?>     
    
</div>
<!-- END CONTENT -->

<?php get_sidebar();?>

<?php get_footer(); ?>