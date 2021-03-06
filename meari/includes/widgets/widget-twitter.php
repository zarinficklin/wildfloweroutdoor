<?php
/*---------------------------------------------------------------------------------*/
/* Twitter widget */
/*---------------------------------------------------------------------------------*/
class App_Twitter extends WP_Widget {

   function App_Twitter() {
	   $widget_ops = array('description' => 'Twitter Stream Widget display tweets from a any Twitter account in the sidebar of your blog. You can customise the number of updates shown in the sidebar' );
       parent::WP_Widget(false, __('Meari - Twitter Stream', HANA_SHORTNAME),$widget_ops);      
   }
   
   function widget($args, $instance) {  
    extract( $args );
	   $title = $instance['title'];
	   $limit = $instance['limit']; if (!$limit) $limit = 5;
		$username = $instance['username'];
		$unique_id = $args['widget_id'];?>
		
		<?php echo $before_widget; ?>
        <?php if ($title) echo $before_title . $title . $after_title; ?>
        <div class="twitter-widget-holder">
        <div class="twitter-widget-top"></div>
        <div class="twitter-widget-center"><ul id="twitter_update_list_<?php echo $unique_id; ?>" class="twitter_ul"><li></li></ul></div>
        <div class="twitter-widget-bottom"></div>
		<div class="twitter-bird-holder"><img src="<?php echo get_template_directory_uri();?>/images/img/twitter-bird-sidebar.png" alt="Twitter bird" /></div>
		</div>
        <?php echo twitter_script($unique_id,$username,$limit); //Javascript output function ?>	 
        <?php echo $after_widget; ?>
        
   		
	<?php
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {        
   
       $title = esc_attr($instance['title']);
       $limit = esc_attr($instance['limit']);
	   $username = esc_attr($instance['username']);
       ?>
       <p>
	   	 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',HANA_SHORTNAME); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
       </p>
       <p>
	   	 <label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username:',HANA_SHORTNAME); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('username'); ?>"  value="<?php echo $username; ?>" class="widefat" id="<?php echo $this->get_field_id('username'); ?>" />
       </p>
       <p>
	   	  <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Number of tweets:',HANA_SHORTNAME); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('limit'); ?>"  value="<?php echo $limit; ?>" class="" size="3" id="<?php echo $this->get_field_id('limit'); ?>" />
       </p>
      <?php
   }
   
} 
register_widget('App_Twitter');
?>