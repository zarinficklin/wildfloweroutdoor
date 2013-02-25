<?php
/**
 * Widgets shortcodes.
 */                     



/* ------------------------------------------------------------------------*
 * TESTIMONIALS
 * ------------------------------------------------------------------------*/


function hana_show_testimonial($atts, $content = null) {
	extract(shortcode_atts(array(
		"name" => '',
		"img" =>'',
		"org" =>'',
		"link" =>'',
		"occup" =>''
		), $atts));
		
		$addClass=$img?'':' no-image';
		$testim='<div class="testimonial-container'.$addClass.'"><h2>'.$name.'</h2><span class="testimonials-details">'.$occup;
		if($org){
			$testim.=' / ';
			if($link) $testim.='<a href="'.$link.'">';
			$testim.=$org;
			if($link) $testim.='</a>';
		}
		$testim.='</span><div class="heading-width-line"></div>';
		if ($img) $testim.='<img class="img-frame testimonial-img" src="'.$img.'" alt="" />';
		$testim.='<blockquote><p>'.do_shortcode($content).'</p></blockquote><div class="clear"></div></div>';
		return $testim;
}
add_shortcode('hana_testimonial', 'hana_show_testimonial');

/**
 * Shortcode - [hana_google_map]
 */

function hana_google_map( $atts ) {
	
	extract( shortcode_atts( array(
		'maptype' 	=> 'roadmap',  	// hybrid, satellite, roadmap, terrain
		'zoom'		=> 14,			// 1-19
		'address'	=> '',			// Ex: 6921 Brayton Drive, Anchorage, Alaska
		'html'		=> '',			// Will default to Address if left empty
		'popup'		=> 'true',		// true/false
		'width'		=> '',			// Leave blank for 100%, need to use 'px' or '%'
		'height'	=> '500px'		// Need to use 'px' or '%'
	), $atts ) );
	
	// Map type
	$maptype = strtoupper( $maptype );
	
	// HTML
	if( ! $html )
		$html = $address;
		
	// Width/Height
	$styles = 'height:'.$height;
	if( $width )
		$styles .= ';width:'.$width;
	
	// Unique ID
	$id = rand();
	
	// Start output
	ob_start();
	?>
	<!-- INCLUDE GOOGLE MAP API (can't be enqueue'd by WP) -->	
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	
	<!-- RUN gMap() -->
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("#hana_gmap_<?php echo $id; ?>").gMap({
			maptype: "<?php echo $maptype; ?>",
			zoom: <?php echo $zoom; ?>,
			markers: [
				{
					address: "<?php echo $address; ?>",
					popup: <?php echo $popup; ?>,
					html: "<?php echo $html; ?>"
				}
			],
			controls: {
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: false,
				overviewMapControl: false
			}
		});
	});
	</script>
	<div id="hana_gmap_<?php echo $id; ?>" style="<?php echo $styles; ?>"></div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'hana_google_map', 'hana_google_map' );

function hana_widget_contactform(){
	$html='<div class="widget-contact-form">
<form method="post" id="submit-form" class="hana-contact-form">
<div class="error-box fail-message">An error occurred. Message not sent.</div>
  <input type="text" name="name" class="required clear-on-click" id="name_text_box" placeholder="'.hana_get_text('_name_text').'" />
  <input type="text" name="email" class="required clear-on-click email" id="email_text_box" placeholder="'.hana_get_text('_your_email_text').'" />
  <textarea name="question" rows="" cols="" class="required"
    id="question_text_area"></textarea>
  
  <a class="button send-button"><span>'.hana_get_text('_send_text').'</span></a>
  <div class="contact-loader"></div><div class="check"></div>
   
</form><div class="clear"></div></div>';
	return $html;
}

add_shortcode('hana_contactform', 'hana_widget_contactform');


class ContactForm extends WP_Widget {

   function ContactForm() {
  	   $widget_ops = array('description' => 'Contact Form Widget' );
       parent::WP_Widget(false, $name = __(HANA_THEMENAME .' - ContactForm', HANA_SHORTNAME), $widget_ops);    
   }


   function widget($args, $instance) {        
		extract( $args );
        $title = $instance['title'];
		echo $before_widget;
		if($title!='') echo $before_title.$title.$after_title;
		echo do_shortcode('[hana_contactform]');
		echo $after_widget;
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {     
       $title = esc_attr($instance['title']);	
       ?> 
       <p>
       <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',HANA_SHORTNAME); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
       </label>
       </p>      
       <?php 
   }

} 
register_widget('ContactForm');

function show_social_media($atts, $content = null) {
	$icon_links=explode(HANA_SEPARATOR, get_option('_icon_links'));
	$icon_imgs=explode(HANA_SEPARATOR, get_option('_icon_urls'));
	$icon_titles=explode(HANA_SEPARATOR, get_option('_icon_titles'));
	array_pop($icon_links);
	array_pop($icon_imgs);
	array_pop($icon_titles);
	
	$size=($atts['size']!='')?$atts['size']:'24';
	$html='<div id="social-icons"><ul class="social">';
	for($i=0; $i<sizeof($icon_links); $i++){
		$title=$icon_titles[$i]?'<strong>'.$icon_titles[$i].'</strong>':'';
		$html.='<li><a href="'.$icon_links[$i].'" target="_blank"><img src="'.str_replace('16',$size,$icon_imgs[$i]).'" alt="" />'.$title.'</a></li>';
	}
	$html.='</ul></div>';
	return $html;
}
add_shortcode('socialmedia', 'show_social_media');

class Social_Media extends WP_Widget {

   function Social_Media() {
  	   $widget_ops = array('description' => 'Social Media Widget' );
       parent::WP_Widget(false, $name = __(HANA_THEMENAME .' - Social Media', HANA_SHORTNAME), $widget_ops);    
   }


   function widget($args, $instance) {        
		extract( $args );
        $title = $instance['title'];
        $size = $instance['size'];
		echo $before_widget;
		if($title!='') echo $before_title.$title.$after_title;
		echo do_shortcode('[socialmedia size="'.$size.'"]');
		echo $after_widget;
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {     
       $title = esc_attr($instance['title']);	
       $size = esc_attr($instance['size']);   
       ?> 
       <p>
       <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',HANA_SHORTNAME); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
       </label>
       </p>     
       <p>
       <label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Icon Size:',HANA_SHORTNAME); ?>
       <select class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>">
       		<option value='16' <?php selected( $size, 16 ); ?>>16</option>
       		<option value='24' <?php selected( $size, 24 ); ?>>24</option>
       		<option value='32' <?php selected( $size, 32 ); ?>>32</option>
       		<option value='48' <?php selected( $size, 48 ); ?>>48</option>
       </select>
       </label>
       </p>       
       <?php 
   }

} 
register_widget('Social_Media');

?>