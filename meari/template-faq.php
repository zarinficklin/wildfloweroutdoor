<?php
/*
Template Name: FAQ Page
*/  

get_header();?> 

<!-- START CONTENT -->
<div id="content">
    
    <?php if ( have_posts() ) : 

	    while ( have_posts() ) : the_post();
		
			if($hana_page_options['show_title']!='off')
				the_title( '<h1 class="page-title">', '</h1>' );     
			?>	
			
			<div id="post-<?php the_ID(); ?>" <?php post_class(meari_content_class()); ?>>
            
				<?php	the_content();?>
    
                <div class="faq_container">
                                <?php
                                $args = array(
                                    'post_type'      => 'faq',
                                    'posts_per_page' => -1
                                );                   
                                
                                
                                
                                $faq = new WP_Query( $args );   
                                
                                $first = TRUE;
                                $close_first = FALSE;
                                if( $close_first ) $first = FALSE;
                
                                $html = '';
                                
                                
                                while( $faq->have_posts() ) : $faq->the_post(); 
                                    
                                    $title = the_title( '', '', false );
                                    $content = get_the_content() . ' ' . the_category();
                        
                                    echo '<div class="faq">
										<h4 class="faq-title">'.$title.'</h4>
										<div class="heading-width-line"></div>
										<div class="faq-content">
											'.meari_addp($content).'
										</div>  
									</div>';
                                
                                endwhile; 
                                wp_reset_query(); 
                                ?>
                </div>
                
			</div><?php
		
		endwhile; 
	
	endif;?>     
    
</div>
<!-- END CONTENT -->

<?php get_sidebar();?> 

<?php get_footer() ?>