<?php

$hana_slider_options= array( array(
"name" => "Slider Settings",
"type" => "title",
"img" => HANA_IMAGES_URL."icon_slider.png"
),

array(
"type" => "open",
"subtitles"=>array(array("id"=>"nivo", "name"=>"Nivo"), array("id"=>"supersized", "name"=>"Supersized"), array("id"=>"elegant", "name"=>"Elegant"), array("id"=>"elastic", "name"=>"Elastic"), array("id"=>"content", "name"=>"Content"), array("id"=>"cycle", "name"=>"Cycle"), array("id"=>"products", "name"=>"Products"))
),

/* ------------------------------------------------------------------------*
 * NIVO SLIDER
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'nivo'
),

array(
"name" => "Slider Width",
"id" => HANA_SHORTNAME."_nivo_width",
"type" => "text",
"std" => "Fullwidth - Fixed",
"desc" => "Width of nivo slider.",
"disabled" => "disabled"
),

array(
"name" => "Slider Height",
"id" => HANA_SHORTNAME."_nivo_height",
"type" => "text",
"std" => "500",
"desc" => "Height of nivo slider."
),


array(
"name" => "Automatic image resizing",
"id" => HANA_SHORTNAME."_nivo_auto_resize",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, the images will be resized automatically.'
),

array(
"name" => "Show navigation",
"id" => HANA_SHORTNAME."_exclude_nivo_navigation",
"type" => "multicheck",
"options" => array(array("id"=>"arrows", "name"=>"Arrows"), array("id"=>"bar", "name"=>"Navigation Bar")),
"class"=>"exclude"
),

array(
"name" => "Animation Effect",
"id" => HANA_SHORTNAME."_nivo_animation",
"type" => "multicheck",
"options" => array(array('id'=>'fold','name'=>'Fold'),array('id'=>'fade','name'=>'Fade'),
array('id'=>'sliceDownRight','name'=>'Slice Down'),array('id'=>'sliceDownLeft','name'=>'Slice Down Left'),array('id'=>'sliceUpRight','name'=>'Slice Up'),
array('id'=>'sliceUpDown','name'=>'Slice Up Down'),array('id'=>'sliceUpLeft','name'=>'Slice Up Left'),array('id'=>'sliceUpDownLeft','name'=>'Slice Up Down Left'),
array('id'=>'boxRandom','name'=>'Box Random'),array('id'=>'boxRain','name'=>'Box Rain'),array('id'=>'boxRainReverse','name'=>'Box Rain Reverse'),array('id'=>'boxRainGrow','name'=>'Box Rain Grow'),array('id'=>'boxRainGrowReverse','name'=>'Box Rain Grow Reverse')
),
"class"=>"include",
"std"=>"fold,fade,sliceDownRight,sliceDownLeft,sliceUpRight,sliceUpDown,sliceUpLeft,sliceUpDownLeft,boxRandom,boxRain,boxRainReverse,boxRainGrow,boxRainGrowReverse"
),

array(
"name" => "Number of slices",
"id" => HANA_SHORTNAME."_nivo_slices",
"type" => "text",
"std" => "15",
"desc" => "For slice animations only."
),

array(
"name" => "Number of box rows",
"id" => HANA_SHORTNAME."_nivo_rows",
"type" => "text",
"std" => "4",
"desc" => "For box animations only."
),

array(
"name" => "Number of box columns",
"id" => HANA_SHORTNAME."_nivo_columns",
"type" => "text",
"std" => "8",
"desc" => "For box animations only."
),

array(
"name" => "Animation Speed",
"id" => HANA_SHORTNAME."_nivo_speed",
"type" => "text",
"std" => "800",
"desc" => "The animation speed in miliseconds"
),

array(
"name" => "Pause interval",
"id" => HANA_SHORTNAME."_nivo_interval",
"type" => "text",
"std" => "3000",
"desc" => "The time interval between image changes in miliseconds"
),

array(
"name" => "Autoplay",
"id" => HANA_SHORTNAME."_nivo_autoplay",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, the images will rotate automatically'
),

array(
"name" => "Pause on hover",
"id" => HANA_SHORTNAME."_nivo_pause_hover",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, when the user hovers the image, the automatic rotation will pause.'
),


array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * SUPERSIZED SLIDER
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'supersized'
),

array(
"name" => "Slider Width",
"id" => HANA_SHORTNAME."_supersized_width",
"type" => "text",
"desc" => "Width of a Supersized Slider",
"std" => 'Fullwidth - Fixed',
"disabled" => 'disabled'
),

array(
"name" => "Slider Height",
"id" => HANA_SHORTNAME."_supersized_height",
"type" => "text",
"desc" => "Height of a Supersized Slider",
"std" => '500'
),

array(
"name" => "Automatic image resizing",
"id" => HANA_SHORTNAME."_supersized_auto_resize",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If ON selected, the images will be resized automatically.'
),

array(
"name" => "Transition",
"id" => HANA_SHORTNAME."_supersized_transition",
"type" => "select",
"std" => '6',
"options" => array(array('id'=>'0','name'=>'None'), array('id'=>'1','name'=>'Fade'), array('id'=>'2','name'=>'SlideTop'), array('id'=>'3','name'=>'SlideRight'), array('id'=>'4','name'=>'SlideBottom'), array('id'=>'5','name'=>'SlideLeft'),array('id'=>'6','name'=>'CarouselRight'), array('id'=>'7','name'=>'CarouselLeft')),
"desc" => 'Controls which effect is used to transition between slides.'
),

array(
"name" => "Transition Speed",
"id" => HANA_SHORTNAME."_supersized_transition_speed",
"type" => "text",
"std" => '1000',
"desc" => 'Speed of transitions in milliseconds.'
),

array(
"name" => "Pause Interval",
"id" => HANA_SHORTNAME."_supersized_interval",
"type" => "text",
"std" => '5000',
"desc" => 'Time between slide changes in milliseconds.'
),

array(
"name" => "Autoplay",
"id" => HANA_SHORTNAME."_supersized_autoplay",
"type" => "checkbox",
"std" => 'on',
"desc" => 'Determines whether slideshow begins playing when page is loaded.'
),

array(
"name" => "Pause on hover",
"id" => HANA_SHORTNAME."_supersized_pause_hover",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, when the user hovers the image, the automatic rotation will pause.'
),

array(
"type" => "close"),


/* ------------------------------------------------------------------------*
 * Elegant SLIDER
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'elegant'
),

array(
"name" => "Slider Width",
"id" => HANA_SHORTNAME."_elegant_width",
"type" => "text",
"desc" => "Width of a Elegant Slider",
"std" => 'Fullwidth - Fixed',
"disabled" => "disabled"
),

array(
"name" => "Slider Height",
"id" => HANA_SHORTNAME."_elegant_height",
"type" => "text",
"desc" => "Height of a Elegant Slider",
"std" => '500'
),


array(
"name" => "Automatic image resizing",
"id" => HANA_SHORTNAME."_elegant_auto_resize",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, the images will be resized automatically.'
),

array(
"name" => "Transition Speed",
"id" => HANA_SHORTNAME."_elegant_speed",
"type" => "text",
"std" => "700",
"desc" => "Speed in milliseconds of scrolling transition"
),

array(
"name" => "Pause Interval",
"id" => HANA_SHORTNAME."_elegant_interval",
"type" => "text",
"std" => '5000',
"desc" => 'Time between slide changes in milliseconds.'
),

array(
"name" => "Autoplay",
"id" => HANA_SHORTNAME."_elegant_autoplay",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, the images will rotate automatically'
),

array(
"name" => "Pause on hover",
"id" => HANA_SHORTNAME."_elegant_pause_hover",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, when the user hovers the image, the automatic rotation will pause.'
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * Content SLIDER
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'content'
),

array(
"type" => "block",
"title" => "Background & Color"
),

array(
"type" => "bgset",
"name" => "",
"prefix" => "content_slider",
"stds" => array("bg"=>"image", "bg_image"=>MEARI_IMAGE_URL."waves.gif", "bg_repeat"=>"repeat")
),

array(
"name" => "Navigation Color",
"id" => HANA_SHORTNAME."_content_slider_nav_color",
"type" => "color",
"desc" => 'Color of navigation buttons.',
"std" => "29434D"
),

array(
"type" => "blockclose"
),

array(
"name" => "Slider Width",
"id" => HANA_SHORTNAME."_content_width",
"type" => "text",
"desc" => "Width of a Content Slider",
"std" => 'Fullwidth - Fixed',
"disabled" => "disabled"
),

array(
"name" => "Slider Height",
"id" => HANA_SHORTNAME."_content_height",
"type" => "text",
"desc" => "Height of a Content Slider",
"std" => '450'
),

array(
"name" => "Pause Interval",
"id" => HANA_SHORTNAME."_content_interval",
"type" => "text",
"std" => '3000',
"desc" => 'Time between slide changes in milliseconds.'
),

array(
"name" => "Autoplay",
"id" => HANA_SHORTNAME."_content_autoplay",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, the images will rotate automatically'
),

array(
"name" => "Parallax Effect",
"id" => HANA_SHORTNAME."_content_parallax_effect",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, the bg position will be increased when sliding (parallax effect).'
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * ELASTIC SLIDER
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'elastic'
),

array(
"name" => "Slider Width",
"id" => HANA_SHORTNAME."_elastic_width",
"type" => "text",
"desc" => "Width of a Elastic Slider",
"std" => 'Fullwidth - Fixed',
"disabled" => 'disabled'
),

array(
"name" => "Slider Height",
"id" => HANA_SHORTNAME."_elastic_height",
"type" => "text",
"desc" => "Height of a Elastic Slider",
"std" => '500'
),


array(
"name" => "Automatic image resizing",
"id" => HANA_SHORTNAME."_elastic_auto_resize",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, the images will be resized automatically.'
),

array(
"name" => "Animation Speed",
"id" => HANA_SHORTNAME."_elastic_speed",
"type" => "text",
"std" => "800",
"desc" => "The animation speed in miliseconds"
),

array(
"name" => "Pause interval",
"id" => HANA_SHORTNAME."_elastic_interval",
"type" => "text",
"std" => "3000",
"desc" => "The time interval between image changes in miliseconds"
),

array(
"name" => "Title interval",
"id" => HANA_SHORTNAME."_elastic_title_interval",
"type" => "text",
"std" => "800",
"desc" => "The time interval between Titles changes in miliseconds"
),

array(
"name" => "Autoplay",
"id" => HANA_SHORTNAME."_elastic_autoplay",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, the images will rotate automatically'
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * Cycle SLIDER
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'cycle'
),

array(
"name" => "Style",
"id" => HANA_SHORTNAME."_cycle_style",
"type" => "select",
"desc" => "Style of the cycle slider",
"std" => 'cycle-slider',
"options" => array(array("id"=>"cycle-slider", "name"=>"Demo 1"), array("id"=>"cycle-slider2", "name"=>"Demo 2"), array("id"=>"cycle-slider3", "name"=>"Demo 3 - Thumbnails"))
),

array(
"name" => "Slider Width",
"id" => HANA_SHORTNAME."_cycle_width",
"type" => "text",
"desc" => "Width of a Cycle Slider",
"std" => '950 - Fixed',
"disabled" => "disabled"
),

array(
"name" => "Slider Height",
"id" => HANA_SHORTNAME."_cycle_height",
"type" => "text",
"desc" => "Height of a Cycle Slider",
"std" => '400'
),

array(
"name" => "Automatic image resizing",
"id" => HANA_SHORTNAME."_cycle_auto_resize",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, the images will be resized automatically.'
),

array(
"name" => "Scrolling Speed",
"id" => HANA_SHORTNAME."_cycle_speed",
"type" => "text",
"std" => "700",
"desc" => "Speed in milliseconds of scrolling animation"
),

array(
"name" => "Pause Interval",
"id" => HANA_SHORTNAME."_cycle_interval",
"type" => "text",
"std" => '3000',
"desc" => 'Time between slide changes in milliseconds.'
),

array(
"name" => "Autoplay",
"id" => HANA_SHORTNAME."_cycle_autoplay",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, the images will rotate automatically'
),

array(
"name" => "Pause on hover",
"id" => HANA_SHORTNAME."_cycle_pause_hover",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, when the user hovers the image, the automatic rotation will pause.'
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * Products SLIDER
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'products'
),

array(
"name" => "Products By",
"id" => HANA_SHORTNAME."_products_by",
"type" => "select",
"options" => array(array("id"=>"recent", "name"=>"Recent"), array("id"=>"featured", "name"=>"Featured"), array("id"=>"best_seller", "name"=>"Best Seller")),
"std" => 'recent',
),

array(
"name" => "Products Count",
"id" => HANA_SHORTNAME."_products_count",
"type" => "text",
"std" => '8',
"desc" => 'Count of products to show.'
),

array(
"name" => "Products Image Width",
"id" => HANA_SHORTNAME."_products_image_width",
"type" => "text",
"std" => '270px - Fixed',
"disabled" => 'disabled'
),

array(
"name" => "Products Image Height",
"id" => HANA_SHORTNAME."_products_image_height",
"type" => "text",
"std" => '310',
),

array(
"name" => "Pause interval",
"id" => HANA_SHORTNAME."_products_interval",
"type" => "text",
"std" => "3000",
"desc" => "The time interval between item changes in miliseconds"
),

array(
"name" => "Autoplay",
"id" => HANA_SHORTNAME."_products_autoplay",
"type" => "checkbox",
"std" => 'off',
"desc" => 'If enabled, the items will rotate automatically'
),

array(
"type" => "close"),

array(
"type" => "close"));

$new_hana_slider_options = hana_add_custom_options($hana_slider_options);

hana_add_options($new_hana_slider_options);