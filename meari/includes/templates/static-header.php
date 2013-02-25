<?php 
if(is_page())
	if(function_exists('has_post_thumbnail') && has_post_thumbnail()) {
		$image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
		$height = get_post_meta(get_the_ID(),'static_image_height_value',true);
		$image = hana_get_resized_image($image_src[0],$image_src[1],($height)?$height:$image_src[2]);
	}
else {
	global $hana_page_options;
	$image = $hana_page_options['static_image'];
}
?>
<?php if($image):?>
<div id="static-header-img" style="background-image: url(<?php echo $image;?>);">
	<img src="<?php echo $image; ?>"/>
</div>
<?php endif;?>