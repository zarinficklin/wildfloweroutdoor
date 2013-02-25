<?php
$max_width=1920; //fixed
if(hana_get_opt('_body_layout')=='boxed') $max_width=1030;
$height=hana_get_opt('_elastic_height');
$interval=hana_get_opt('_elastic_interval');
$titleinterval=hana_get_opt('_elastic_title_interval');
$speed=hana_get_opt('_elastic_speed');
$autoplay=hana_get_opt('_elastic_autoplay')=='on'?'true':'false';
$resize=hana_get_opt('_elastic_auto_resize')=='on'?true:false;
?>

<div id="slider-container">
<div id="elastic-slider" class="ei-slider" style="height:<?php echo $height;?>px;">
<ul class="ei-slider-large">
<?php 
global $slider_data;
$slider_posts=$slider_data['posts'];
$thumbs = '';
foreach($slider_posts as $key=>$slider_post){

	$link=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'image_link', true);
	$title=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'imgtitle', true);
	$tooltip=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'tooltip', true);
	$imgurl=get_post_meta($slider_post->ID, HANA_CUSTOM_PREFIX.'image_url', true);
	if(!$imgurl) continue;
	
	if($resize)
		$path=hana_get_resized_image($imgurl, $max_width, $height); 
	else
		$path=$imgurl;
	
	$thumbs.='<li><a href="#"></a><img src="'.hana_get_resized_image($imgurl, 150, 59).'" alt="" /></li>';
	?>
	<li>
		<?php if($link) echo('<a href="'.$link.'">');?><img src="<?php echo $path;?>" alt="<?php echo $title;?>"/><?php if($link) echo('</a>');?>
        <div class="ei-title">
            <h2><?php echo $title; ?></h2>
            <h3><?php echo $tooltip; ?></h3>
        </div>
        <?php
        ?>
    </li> 
    <?php
}
?>
</ul>
<ul class="ei-slider-thumbs">
    <li class="ei-slider-element">Current</li>
    <?php echo $thumbs ?>
</ul><!-- ei-slider-thumbs -->    
</div>
<script type="text/javascript">
	jQuery(function($) {
		$('#elastic-slider').eislideshow({
			animation			: 'center',
			speed				: <?php echo $speed; ?>,
			slideshow_interval	: <?php echo $interval; ?>,
			titlespeed			: <?php echo $titleinterval; ?>,
			autoplay			: <?php echo $autoplay; ?>,
			titlesFactor		: 0
		});
	});
</script>
</div>

