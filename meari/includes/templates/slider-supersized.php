<?php
$max_width=1920; //fixed
if(hana_get_opt('_body_layout')=='boxed') $max_width=1030;
$height=hana_get_opt('_supersized_height');
$autoplay=hana_get_opt('_supersized_autoplay')=='on'?'true':'false';
$pause_hover=hana_get_opt('_supersized_pause_hover')=='on'?'true':'false';
$resize=hana_get_opt('_supersized_auto_resize')=='on'?true:false;
$interval=hana_get_opt('_supersized_interval');
$transition = hana_get_opt('_supersized_transition');
$transition_speed = hana_get_opt('_supersized_transition_speed');
?>

<div id="slider-container">

<div id="slider-thumbnail-container" style="position:relative; height:<?php echo $height;?>px; overflow:hidden;">
<!--Thumbnail Navigation-->
	<div id="prevthumb"></div>
	<div id="nextthumb"></div>
	
	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
	
	<div id="thumb-tray" class="load-item">
		<div id="thumb-back"></div>
		<div id="thumb-forward"></div>
	</div>
	
	<!--Time Bar-->
	<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>
	
	<!--Control Bar-->
	<div id="controls-wrapper" class="load-item">
		<div id="controls">
			
			<a id="play-button"><img id="pauseplay" src="<?php echo MEARI_IMAGE_URL; ?>thumbnail-slider/pause.png"/></a>
		
			<!--Slide counter-->
			<div id="slidecounter">
				<span class="slidenumber"></span> / <span class="totalslides"></span>
			</div>
			
			<!--Slide captions displayed here-->
			<div id="slidecaption"></div>
			
			<!--Thumb Tray button-->
			<a id="tray-button"><img id="tray-arrow" src="<?php echo MEARI_IMAGE_URL; ?>thumbnail-slider/button-tray-up.png"/></a>
			
			<!--Navigation-->
			<ul id="slide-list"></ul>
			
		</div>
	</div>
    <ul id="supersized"></ul>
</div>
<script type="text/javascript">
	
	jQuery(function($){		
		$('#slider-thumbnail-container').supersized({		
			// Functionality
			slideshow               :   1,			// Slideshow on/off
			autoplay				:	<?php echo $autoplay; ?>,			// Slideshow starts playing automatically
			start_slide             :   1,			// Start slide (0 is random)
			stop_loop				:	0,			// Pauses slideshow on last slide
			random					: 	0,			// Randomize slide order (Ignores start slide)
			slide_interval          :   <?php echo $interval; ?>,		// Length between transitions
			transition              :   <?php echo $transition; ?>, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
			transition_speed		:	<?php echo $transition_speed; ?>,		// Speed of transition
			new_window				:	1,			// Image links open in new window/tab
			pause_hover             :   <?php echo $pause_hover; ?>,			// Pause slideshow on hover
			keyboard_nav            :   1,			// Keyboard navigation on/off
			performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
			image_protect			:	1,			// Disables image dragging and right click with Javascript
													   
			// Size & Position						   
			min_width		        :   0,			// Min width allowed (in pixels)
			min_height		        :   0,			// Min height allowed (in pixels)
			vertical_center         :   1,			// Vertically center background
			horizontal_center       :   1,			// Horizontally center background
			fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
			fit_portrait         	:   1,			// Portrait images will not exceed browser height
			fit_landscape			:   0,			// Landscape images will not exceed browser width
													   
			// Components							
			slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
			thumb_links				:	1,			// Individual thumb links for each slide
			thumbnail_navigation    :   0,			// Thumbnail navigation
			slides 					:  	[			// Slideshow Images
			<?php
				global $slider_data;
				$slider_posts=$slider_data['posts'];
				
				$content = '';
				$last_item = count($slider_posts);
				$i=0;
				foreach($slider_posts as $key=>$post){
					$link=get_post_meta($post->ID, HANA_CUSTOM_PREFIX.'image_link', true);
					$title=get_post_meta($post->ID, HANA_CUSTOM_PREFIX.'image_title', true);
					$imgurl=get_post_meta($post->ID, HANA_CUSTOM_PREFIX.'image_url', true);
					if(!$imgurl) continue;
					
					if($resize)
						$path=hana_get_resized_image($imgurl, $max_width, $height); 
					else
						$path=$imgurl;
					$thumb_path=hana_get_resized_image($imgurl, 200, 150);
					?>
					{image:'<?php echo $path;?>', title:'<?php echo $title;?>', thumb: '<?php echo $thumb_path;?>', url:'<?php echo $link;?>'}<?php if(++$i == $last_item) echo ''; else echo ','; ?>
					<?php
				}
			?>
										],
										
			// Theme Options			   
			progress_bar			:	1,			// Timer for each slide							
			mouse_scrub				:	0,
			image_path				:	'<?php echo MEARI_IMAGE_URL;?>thumbnail-slider/'
			
		});
	});
	
</script>

</div>