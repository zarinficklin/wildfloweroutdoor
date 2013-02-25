<?php
/*---------------------------------------------------------------------------------*/
/* Recent widget */
/*---------------------------------------------------------------------------------*/

class App_Recent extends WP_Widget {

   function App_Recent() {
  	   $widget_ops = array('description' => 'The Recent Posts Widget displays recent post titles and their summaries in the sidebar. You can customize the number of posts to display.' );
       parent::WP_Widget(false, $name = __('Meari - Recent Posts', HANA_SHORTNAME), $widget_ops);    
   }


   function widget($args, $instance) {        
		extract( $args );
        $title = $instance['title']; if ($title == '') $title = 'Recent Posts';
		$number = $instance['number']; if ($number == '') $number = 5;
		echo $before_widget;
		echo $before_title; ?>
		<?php echo $title; ?>
     	<?php echo $after_title; 
     	$excludeCat=explode(',',hana_get_opt('_exclude_cat_from_blog'));
     	
     		
									$args=array( 'category__not_in' => $excludeCat,'paged' => 1,'post_status' => 'publish', 'posts_per_page' =>$number,'ignore_sticky_posts'=> 1);	
									//The Query
									query_posts($args); ?>	
					
									<?php
						
									if ( have_posts() ) : while ( have_posts() ) : the_post(); 
									$imagedata = simplexml_load_string(get_the_post_thumbnail());	
									$title = the_title('','',FALSE);
									if ($title<>substr($title,0,35)){ $dots = "...";}else{$dots = "";}
									?>
							<div class="recent-post-holder <?php echo has_post_thumbnail()?'':'without-thumb';?>">
							<?php if (has_post_thumbnail()) {								
							$imagedata = simplexml_load_string(get_the_post_thumbnail()); ?>
								<div class="recent-post-image-holder">
									<a href="<?php the_permalink(); ?>">
										<span class="recent-post-image"><img src="<?php echo hana_get_resized_image($imagedata->attributes()->src,46,46);?>" alt="<?php the_title(); ?>" />
											<span class="recent-post-number-image">
											<?php 
											
									$comments = get_comments("post_id=".get_the_ID());
										
										$num_of_comments = 0;
										foreach((get_the_category()) as $category) { 
										    $post_category = $category->cat_name;
											$post_category_id = $category->cat_ID;
											$cat_slug=get_cat_slug($post_category_id);
										} 
				
										foreach($comments as $comm) :
											$num_of_comments++;
											
											
										endforeach;
									?>
												<span class="number-of-posts"><?php echo $num_of_comments;?></span>
											</span>
										</span>
									</a>
								</div>
							<?php } ?>	
								<div class="recent-post-content"><a href="<?php the_permalink(); ?>"><?php echo substr($title,0,35).$dots; ?></a></div>
                                <span><?php the_time('F d, Y');?></span>
								
							</div>	
							
									
									<?php endwhile;?> 
									<?php else: ?>
									
									<?php endif; 
							
			 ?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.recent-post-number-image').hover(function(){
			var parent = jQuery(this).parent('.recent-post-image');
			jQuery('img',parent).css('opacity','0.4');
		},function(){
			var parent = jQuery(this).parent('.recent-post-image');
			jQuery('img',parent).css('opacity','1');
		});
		jQuery('img','.recent-post-image').hover(function(){
			jQuery(this).css('opacity','0.4');
		},function(){
			jQuery(this).css('opacity','1');
		});
		jQuery('img','.recent-post-image').css('opacity','1');
	});
</script>			
						<?php	//Reset Query
									wp_reset_query(); ?>

			
			<?php echo $after_widget; ?>
    
         <?php 
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {     
       $title = esc_attr($instance['title']);
       $number = esc_attr($instance['number']);
      
	   
       ?> 
       <p>
       <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',HANA_SHORTNAME); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
       </label>
       </p>     
       <p>
       <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts:',HANA_SHORTNAME); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
       </label>
       </p>
       <p>
       	Slideshow category and Info category are excluded from Recent posts.
       </p>
       
       <?php 
   }

} 
register_widget('App_Recent');
?>