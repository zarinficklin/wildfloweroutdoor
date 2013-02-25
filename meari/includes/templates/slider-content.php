<?php
$width=950; //fixed
$height=hana_get_opt('_content_height');
$autoplay=hana_get_opt('_content_autoplay')=='on'?true:false;
$interval = hana_get_opt('_content_interval');
$parallax=hana_get_opt('_content_parallax_effect')=='on'?true:false;

global $slider_data;
$slider_posts=$slider_data['posts'];
?>

<div id="slider-container" class="content-slider-container">

<div id="da-slider" class="da-slider" style="height: <?php echo $height;?>px;">
	<?php 
	foreach($slider_posts as $key=>$slider_post):
		$link=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'image_link', true);
		$description=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'description', true);
		$imgurl=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'image_url', true);
		$title = get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'imgtitle', true);
		$image_position = get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'image_position', true);
		if(!$imgurl) continue;
	?>
	<div class="da-slide <?php echo $image_position;?>">
		<h2><?php echo $title;?></h2>
		<p><?php echo $description;?></p>
		<a href="<?php echo $link;?>" class="da-link">Click Here</a>
		<div class="da-img"><img src="<?php echo $imgurl;?>" alt="<?php echo $title;?>" /></div>
	</div>
    <?php endforeach;?>
	<nav class="da-arrows">
		<span class="da-arrows-prev"></span>
		<span class="da-arrows-next"></span>
	</nav>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#da-slider').cslider({
			<?php if($autoplay):?>
			autoplay	: true,
			<?php endif;?>
			<?php if(!$parallax):?>
			bgincrement	: 0,
			<?php endif;?>
			interval	: <?php echo $interval;?>
		});
	});
</script>	

</div>