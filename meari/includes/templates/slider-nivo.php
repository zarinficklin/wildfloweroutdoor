<?php
$width=1920; //fixed
if(hana_get_opt('_body_layout')=='boxed') $width=1030;
$height=hana_get_opt('_nivo_height');
$interval=hana_get_opt('_nivo_interval');
$animation=hana_get_opt('_nivo_animation');
$slices=hana_get_opt('_nivo_slices');
$columns=hana_get_opt('_nivo_columns');
$rows=hana_get_opt('_nivo_rows');
$speed=hana_get_opt('_nivo_speed');
$auto_resize=hana_get_opt('_nivo_auto_resize')=='on'?true:false;
$autoplay=hana_get_opt('_nivo_autoplay')=='on'?'false':'true';
$pauseOnHover=hana_get_opt('_nivo_pause_hover')=='on'?'true':'false';

$exclude_navigation=explode(',', hana_get_opt('_exclude_nivo_navigation'));
$arrows=in_array('arrows', $exclude_navigation)?"false":"true";
$bar=in_array('bar', $exclude_navigation)?false:true;
?>
<div id="slider-container" class="nivo-slider-container">

<script type="text/javascript">
jQuery(window).load(function(){	
	var total = jQuery('#nivo-slider img').length;
	var width_total = 960;
	var width_bar = 960/total;
	var nivo_is_animating = false;
	jQuery('#nivo-slider').nivoSlider({
		effect:"<?php echo $animation; ?>" ,
		controlNav:false,
		directionNav:<?php echo $arrows; ?>,
		slices:<?php echo $slices; ?>,
		animSpeed:<?php echo $speed; ?>,
		pauseTime:<?php echo $interval; ?>,
		controlNavThumbs: true,
		prevText: '', // Prev directionNav text
        nextText: '',
		beforeChange: function() {
			var currentSlide = (jQuery("#nivo-slider").data("nivo:vars").currentSlide+1)%total;
			if (currentSlide<0) currentSlide = total -1;
			jQuery(".nivo-drag-bar").animate({
				left:width_bar*currentSlide
			});
			nivo_is_animating = true;
		},
		afterChange: function() {
			nivo_is_animating = false;
		},
		afterLoad: function() {
			//jQuery("#nivo-slider").children(".nivo-caption").remove();
			jQuery(".nivo-caption").replaceWith('<div class="nivo-captionWrapper"><div class="nivo-caption container_24">'+jQuery(".nivo-caption").html()+'</div></div>');
			jQuery(".nivo-directionNav").html('<div class="nivo-directionNavWrapper container_24">'+jQuery(".nivo-directionNav").html()+'</div>');
			jQuery("#nivo-slider").css('height','auto');
		},
		pauseOnHover:<?php echo $pauseOnHover; ?>,
		manualAdvance : <?php echo $autoplay;?>,
		boxCols: <?php echo $columns;?>, // For box animations
		boxRows: <?php echo $rows;?>, // For box animations
	});
	
	 // slideTo function for nivo-slider
	jQuery.slideTo = function(idx) {
		if(jQuery("#nivo-slider").data("nivo:vars").currentSlide==idx) return;
		jQuery('#nivo-slider').data('nivo:vars').currentSlide = idx - 1;
		jQuery("#nivo-slider a.nivo-nextNav").trigger('click'); 
	}
	
	jQuery(".nivo-slideshow-drag").click(function(e) {
		var x = e.pageX - jQuery(this).offset().left;
		if (Math.floor(x / width_bar)>=total)
			jQuery.slideTo(total-1);
		else
			jQuery.slideTo(Math.floor(x / width_bar));
	});

	jQuery(".nivo-drag-bar").width(100/total+'%');
	jQuery(".nivo-drag-bar").draggable({ 
		axis: "x" ,
		stop: function() {
			if(nivo_is_animating) {
				jQuery(".nivo-drag-bar").animate({
					left:width_bar*jQuery("#nivo-slider").data("nivo:vars").currentSlide
				});
				return;
			}
			var position = jQuery(".nivo-drag-bar").position();
			var currentSlide;
			if (position.left == null || position.left>=width_total)
				currentSlide = total-1;
			else
			 	currentSlide = Math.round(position.left / width_bar);
			
			
			jQuery(".nivo-drag-bar").animate({
				left:width_bar*currentSlide
			});
			jQuery.slideTo(currentSlide);
		}
	});
	
	jQuery.resizeNivoSlider = function() {
		var window_width=jQuery('#body_wrapper').width();
		<?php if(hana_get_opt('_body_layout')!='boxed'):?>
		if(window_width>=1920)
			jQuery("#nivo-slider").css("width","100%").css("margin-left",0);
		else if(window_width>=960)
			jQuery("#nivo-slider").css("width","1920").css("margin-left",Math.round((window_width-1920)/2));
		else if(window_width>=768)
			jQuery("#nivo-slider").css("width","1536").css("margin-left",Math.round((window_width-1536)/2));
		else if(window_width>=456)
			jQuery("#nivo-slider").css("width","931").css("margin-left",Math.round((window_width-931)/2));
		else
			jQuery("#nivo-slider").css("width","612").css("margin-left",Math.round((window_width-612)/2));
		<?php endif;?>
			
		width_total = jQuery(".nivo-slideshow-drag-wrapper").css('width').replace(/[^-\d\.]/g, '');
		width_bar = width_total/total;
	}
	jQuery(window).resize(function() {
		jQuery.resizeNivoSlider();
	});
	jQuery.resizeNivoSlider();
});
</script>

<!-- START NIVO SLIDER -->
<div id="nivo-slider" class="nivoSlider" style="max-height:<?php echo $height;?>px; height:<?php echo $height;?>px;">
<?php 
global $slider_data;
$slider_posts=$slider_data['posts'];

foreach($slider_posts as $key=>$slider_post){

	$link=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'image_link', true);
	$description=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'description', true);
	$imgurl=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'image_url', true);
	if(!$imgurl) continue;
	
	if($link){
		echo('<a href="'.$link.'">');
	}
	echo('<img src="');
	if($auto_resize){
		$path=hana_get_resized_image($imgurl, $width, $height);
	}else{
		$path=$imgurl;
	}
	echo($path);
	echo('" alt=""');
	if($description){
		echo(' title="'.stripslashes($description).'"');
	}
	echo('/>');
	if($link){
		echo('</a>');
	}
}
?>
</div>
<!-- END NIVO SLIDER -->

</div>
<?php if($bar):?>
</div>

<div class="nivo-slideshow-drag-wrapper container_24">
    <div class="nivo-slideshow-drag">
        <div class="nivo-drag-bar"><span></span></div>
    </div>

<?php endif;?>