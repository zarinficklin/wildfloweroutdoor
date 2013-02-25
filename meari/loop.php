<?php

global $blog_loop;

$title_class = "post-title ";
if($blog_loop['layout']=='left') $title_class .= "grid_18";
else if($blog_loop['layout']=='right') $title_class .= 'grid_14 prefix_4';
else $title_class .= 'grid_20 prefix_4';

$pagination_class = "";
if($blog_loop['layout']=='left') $pagination_class .= "grid_14 suffix_4";
else if($blog_loop['layout']=='right') $pagination_class .= 'grid_14 prefix_4';
else $pagination_class .= 'grid_20 prefix_4';
                        
echo '<!-- START POST LOOP -->';

if ( have_posts() ) : while ( have_posts() ) : the_post();?>				
                     							
	<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
    	<?php
			$hide_sections=explode(',',hana_get_opt('_exclude_post_sections'));
    		$title = the_title('','',FALSE);
			if ($title<>substr($title,0,60)){ $dots = "...";}else{$dots = "";}?>
        
		<h2 class="<?php echo $title_class;?>"><a href="<?php the_permalink(); ?>"><?php echo substr($title,0,60).$dots; ?></a></h2>
        
    	
        <div class="post-meta grid_4 <?php if($blog_loop['layout']=='left') echo 'alignright';?>">
        	<?php if(!in_array('date',$hide_sections)){?>
        	<div class="post-date">
            	<p class="date"><?php the_time('M');?> <?php the_time('d');?>, <?php the_time('Y');?></p>
                <p class="time"><?php the_time('G:i A');?></p>
            </div>
            <?php }?>
            <?php if(!in_array('author',$hide_sections)){?>
            <div class="post-author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php the_author_meta('user_nicename');?>"><?php echo get_avatar( get_the_author_meta('ID'), 45 ); ?></a></div>
            <?php }?>
        	<?php if(!in_array('comments',$hide_sections)){?>
            <div class="blog-comment"><div class="comment-count"><p><?php comments_popup_link('<span class="count">0</span> '.hana_get_text('_comment_text'), '<span class="count">1</span> '.hana_get_text('_comment_text'), '<span class="count">%</span> '.hana_get_text('_comments_text')); ?></p></div></div>
            <?php }?>
        </div>
        
        <div class="post-content-container <?php if($blog_loop['layout']=='left') echo 'alignleft';?> <?php echo ($blog_loop['layout']=='full')?'grid_20':'grid_14';?>">
        	<div class="post-content">
            	<?php if (has_post_thumbnail()) {?>
                <div class="post-image-holder"><p class="post-image">	
                    <?php the_post_thumbnail( 'blog-standard' );?>
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
    
    <div class="<?php echo $pagination_class;?>"><?php hana_print_pagination();?></div>

<?php else : ?>
	
    <h2 class="center"><?php echo hana_get_text('_no_posts_available_text');?></h2>
                                
<?php endif ; ?>

<!-- END POST LOOP -->