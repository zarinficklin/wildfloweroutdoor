<?php get_header();?>

<div class="blog-container">

    <div id="content" class="<?php echo meari_content_class();?>">
    
        <?php if ( have_posts() ) : ?>
        
			<?php 
            $blog_loop = array();
            $blog_loop['layout'] = $hana_page_options['layout'];
            
			get_template_part( 'loop', 'blog' );?>
            
            <?php
			$comment_class = "omega alpha ";
			if($blog_loop['layout']=='left') $comment_class .= "grid_14 suffix_4";
			else if($blog_loop['layout']=='right') $comment_class .= 'grid_14 prefix_4';
			else $comment_class .= 'grid_20 prefix_4';
			?>
            <div class="comments-container <?php echo $comment_class;?>">
			<?php comments_template(); ?>
            </div>
    
        <?php endif; ?>
    
    </div>
    
    <?php get_sidebar();?>

</div>

<?php get_footer();?>