<?php get_header();?>					
		
        <!-- START 404 CONTAINER -->		
		<div class="container-404">
		
			<h1 class="page-title">404</h1>
            
            <span class="page404span"><?php echo hana_get_text('_404_text');?></span>
			
			<span class="notice404"><?php echo hana_get_text('_404_search_again_text');?></span>
			
			<span class="search404"><?php get_search_form(); ?></span>
            
		</div>
		<!-- END 404 CONTAINER -->
    
<?php get_footer(); ?>