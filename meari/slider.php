<?php 
global $slider_data;

$slider_data = hana_get_slider_data();
if($slider_data):
	?>
    
    <!-- START SLIDER -->
	<div id="slider-wrapper" class="<?php echo $slider_data['type'];?>-wrapper">
			<?php	
					if($slider_data['name']=='static'){
						//this is static image
						meari_get_template('static-header.php');
					}elseif($slider_data['name']=='productslider'){
						//this is products circular slider
						meari_get_template('slider-products.php');
					}
					else{
						//this is a slider
						meari_get_template($slider_data['filename']);
					}
			?>   
	</div>
	<!-- END SLIDER -->
    
<?php endif;?>