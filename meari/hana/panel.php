<?php
/* ------------------------------------------------------------------------*
 * This file contains the main theme options.
 * ------------------------------------------------------------------------*/

//define the main constants that will be used
define("HANA_NIVOSLIDER_POSTTYPE", 'nivoslider');
define("HANA_ELASTICSLIDER_POSTTYPE", 'elasticslider');
define("HANA_ELEGANTSLIDER_POSTTYPE", 'elegantslider');
define("HANA_SUPERSIZEDSLIDER_POSTTYPE", 'supersizedslider');
define("HANA_CONTENTSLIDER_POSTTYPE", 'contentslider');
define("HANA_CYCLESLIDER_POSTTYPE", 'cycleslider');
define("HANA_CUSTOM_PREFIX", 'custom_');
define("HANA_DEFAULT_TERM", 'default');
define("HANA_TERM_SUFFIX", '_category');
define("HANA_NONCE", 'hana-custom-page');
define("HANA_SLIDER_TYPE", 'slider');
	
//register the custom pages - this is the main array that defines the structure of each of the custom pages
hana_register_custompage(HANA_NIVOSLIDER_POSTTYPE, array(
		array('id'=>'image_url', 'type'=>'upload', 'name'=>'Image URL', 'required'=>true),
		array('id'=>'image_link', 'type'=>'text', 'name'=>'Image Link'),
		array('id'=>'description', 'type'=>'textarea', 'name'=>'Image Description')
		), 'Nivo Slider', true, HANA_OPTIONS_PAGE, 'image_url', HANA_SLIDER_TYPE, 'slider-nivo.php');
		
hana_register_custompage(HANA_ELEGANTSLIDER_POSTTYPE, array(
		array('id'=>'image_url', 'type'=>'upload', 'name'=>'Image URL', 'required'=>true),
		array('id'=>'image_link', 'type'=>'text', 'name'=>'Image Link'),
		array('id'=>'description', 'type'=>'textarea', 'name'=>'Image Description')
		), 'Elegant Slider', true, HANA_OPTIONS_PAGE, 'image_url', HANA_SLIDER_TYPE, 'slider-elegant.php');
		
hana_register_custompage(HANA_SUPERSIZEDSLIDER_POSTTYPE, array(
		array('id'=>'image_url', 'type'=>'upload', 'name'=>'Image URL', 'required'=>true),
		array('id'=>'image_link', 'type'=>'text', 'name'=>'Image Link'),
		array('id'=>'image_title', 'type'=>'text', 'name'=>'Image Title')
		), 'Supersized Slider', true, HANA_OPTIONS_PAGE, 'image_url', HANA_SLIDER_TYPE, 'slider-supersized.php');
		
hana_register_custompage(HANA_ELASTICSLIDER_POSTTYPE, array(
		array('id'=>'image_url', 'type'=>'upload', 'name'=>'Image URL', 'required'=>true),
		array('id'=>'imgtitle', 'type'=>'text', 'name'=>'Image Title'),
		array('id'=>'image_link', 'type'=>'text', 'name'=>'Image Link'),
		array('id'=>'tooltip', 'type'=>'textarea', 'name'=>'Tooltip Content')
		), 'Elastic Slider', true, HANA_OPTIONS_PAGE, 'image_url', HANA_SLIDER_TYPE, 'slider-elastic.php');
		
hana_register_custompage(HANA_CONTENTSLIDER_POSTTYPE, array(
		array('id'=>'image_url', 'type'=>'upload', 'name'=>'Image URL', 'required'=>true),
		array('id'=>'imgtitle', 'type'=>'text', 'name'=>'Image Title'),
		array('id'=>'image_link', 'type'=>'text', 'name'=>'Image Link'),
		array('id'=>'image_position', 'type'=>'select', 'name'=>'Image Position','std'=>'left', 'options'=>array(array('id'=>'left', 'name'=>'Left'), array('id'=>'right', 'name'=>'Right'))),
		array('id'=>'description', 'type'=>'textarea', 'name'=>'Description')
		), 'Content Slider', true, HANA_OPTIONS_PAGE, 'image_url', HANA_SLIDER_TYPE, 'slider-content.php');
		
hana_register_custompage(HANA_CYCLESLIDER_POSTTYPE, array(
		array('id'=>'image_url', 'type'=>'upload', 'name'=>'Image URL', 'required'=>true),
		array('id'=>'imgtitle', 'type'=>'text', 'name'=>'Image Title'),
		array('id'=>'image_link', 'type'=>'text', 'name'=>'Image Link'),
		array('id'=>'tooltip', 'type'=>'textarea', 'name'=>'Tooltip Content')
		), 'Cycle Slider', true, HANA_OPTIONS_PAGE, 'image_url', HANA_SLIDER_TYPE, 'slider-cycle.php');
	


?>