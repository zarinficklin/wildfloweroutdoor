<?php
$width=1920; //fixed
if(hana_get_opt('_body_layout')=='boxed') $width=1030;
$height=hana_get_opt('_elegant_height');
$autoplay=hana_get_opt('_elegant_autoplay')=='on'?'true':'false';
$speed = hana_get_opt('_elegant_speed');
$interval = hana_get_opt('_elegant_interval');
$pauseOnHover=hana_get_opt('_elegant_pause_hover')=='on'?'true':'false';
$resize=hana_get_opt('_elegant_auto_resize')=='on'?true:false;
?>

<div id="slider-container" class="slider-center elegant-slider-container" style="width:<?php echo $width;?>px; margin-left:-<?php echo ceil($width/2);?>px; height:<?php echo $height;?>px;">
<ul id="elegant-slider">
<?php 
global $slider_data;
$slider_posts=$slider_data['posts'];

foreach($slider_posts as $key=>$slider_post){

	$link=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'image_link', true);
	$description=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'description', true);
	$imgurl=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'image_url', true);
	if(!$imgurl) continue;
	
	if($resize)
		$path=hana_get_resized_image($imgurl, $width, $height); 
	else
		$path=$imgurl;

	?>
	<li class="slide" style="width:<?php echo $width;?>px; height:<?php echo $height;?>px;">
    	<?php if($link) echo('<a href="'.$link.'">');?><img src="<?php echo $path;?>" title="<?php echo stripslashes($description);?>" style="min-width:<?php echo $width;?>px; min-height:<?php echo $height;?>px" /><?php if($link) echo('</a>');?>
    </li>    
    <?php
}
?>
</ul>
<div class="elegant-slider-navigation-container container_24">
    <div class="elegant-slider-arrows">
        <a href="#" id="elegant_slider_prev"><span>next</span></a>
        <span class="current-slider"><big></big> of <?php echo count($slider_posts);?></span>
        <a href="#" id="elegant_slider_next"><span>prev</span></a>
    </div>
</div>
<div class="elegant-loader"></div>
<script type="text/javascript">
	jQuery(function($) {
		
		$("#elegant-slider").jcarousel({
			scroll: 1,
			wrap: 'circular',
			animation: <?php echo $speed; ?>,
			auto: <?php echo ($autoplay)?$interval/1000:0;?>,
			initCallback: function(carousel){
				carousel.clip.css('width','<?php echo $width; ?>');
				<?php if($autoplay && $pauseOnHover):?>
				carousel.clip.hover(function() {
					carousel.stopAuto();
				}, function() {
					carousel.startAuto();
				});
				<?php endif;?>
				jQuery('#elegant_slider_next').bind('click', function() {
					carousel.next();
					return false;
				});
			
				jQuery('#elegant_slider_prev').bind('click', function() {
					carousel.prev();
					return false;
				});
			},
			setupCallback: function(carousel){
				jQuery(".elegant-loader").hide();
			},
			itemLoadCallback: function(carousel){
				$(".current-slider big").text((carousel.first-1)%<?php echo count($slider_posts);?>+1);
			}
		});
		
	});
</script>
</div>

