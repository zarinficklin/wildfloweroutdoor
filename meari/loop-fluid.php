<?php 
wp_enqueue_script( 'masonry', MEARI_SCRIPT_URL . 'jquery.masonry.min.js', array('jquery'));
?>

<?php
global $blog_loop,$post;
	
echo '<!-- START POST LOOP -->';

if ( have_posts() ) :?>
	<div class="content-masonry clearfix">
	<?php while ( have_posts() ) : the_post();?>				
	<?php $grid = 24/$blog_loop['column']; $grid = 'grid_'.$grid;?>                     							
	<div id="post-<?php the_ID(); ?>" <?php post_class(array('clearfix', $grid)); ?>>
    	<?php
			$hide_sections=explode(',',hana_get_opt('_exclude_post_sections'));
    		$title = the_title('','',FALSE);
			if ($title<>substr($title,0,24)){ $dots = "...";}else{$dots = "";}?>
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo substr($title,0,24).$dots; ?></a></h2>
        
    	<div class="post-content-container">
        	<div class="post-content">
            	<div class="clearfix">
        		<?php if(!in_array('date',$hide_sections)){?>
            	<span class="date" style="float:left"><?php the_time('M');?> <?php the_time('d');?>, <?php the_time('Y');?></span>
                <?php }?>
                <?php if(!in_array('author',$hide_sections)){?>
                <span style="float:right"><?php echo hana_get_text('_posted_by_text');?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php echo get_the_author(); ?></a></span>
                <?php }?>
                </div>     
            	<?php if (has_post_thumbnail()) {?>
                <div class="post-image-holder"><p class="post-image">	
                    <?php the_post_thumbnail( 'blog-column-'.$blog_loop['column'] );?>
                </span></div>
                <?php } ?>
                <div class="full-width-text">
                <?php 
                    if(hana_get_opt('_post_summary')!='excerpt' || is_single()){
                        the_content('');
                        if(!is_single()){
                            $ismore = @strpos( $post->post_content, '<!--more-->');
                            if($ismore){?> <a href="<?php the_permalink(); ?>" class="cell_read_more"><?php echo(hana_get_text('_read_more_text')); ?></a>
                        <?php 
                            }
                        } else {
                            wp_link_pages();	
                        }
                    }else{
                        the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="cell_read_more"><?php echo(hana_get_text('_read_more_text')); ?></a>
                    <?php 
                }?> 
                </div>
                <div class="post-cat-meta">
                <?php if(!in_array('category',$hide_sections)){?>   
                    <?php
						$args=array();
						$categories=wp_get_post_categories($post->ID);
						if ($categories) :
							$numItems = count($categories);
							$i = 0;?>
					<strong><?php echo hana_get_text('_category_text');?>: </strong>
						
 					<?php
						  foreach($categories as $cat)  {
							$category = get_category( $cat );
							echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'meari' ), $category->name ) . '" ' . '>' . $category->name.'</a>';
							if (++$i != $numItems) echo ', ';
						  }
						 endif;
					?>
                    
                    <br />
                <?php }?>
                <?php if(!in_array('tag',$hide_sections)){?> 
                    <?php
						$posttags = get_the_tags();
						if ($posttags) :
							$numItems = count($posttags);
							$i = 0;
					?>
                    <strong><?php echo hana_get_text('_tag_text');?>:</strong>
                    <?php
						foreach($posttags as $tag) {						  
							echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
							if (++$i != $numItems) echo ', ';
					  	}
						endif;
					?>
                <?php }?>    
                </div>
            </div>
        </div>
	</div>

	<?php endwhile;?>
    
    <script type="text/javascript">
	jQuery(function($){	
		jQuery('.content-masonry').imagesLoaded( function() {
			  jQuery('.content-masonry').masonry({
				// options
				itemSelector : '.post'
			  });
		});
	});
	</script>
    </div>
    
    <div><?php hana_print_pagination();?></div>

<?php else : ?>
	
    <h2 class="center"><?php echo hana_get_text('_no_posts_available_text');?></h2>
                                
<?php endif ; ?>

<!-- END POST LOOP -->