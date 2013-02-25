<?php
/* ------------------------------------------------------------------------*
 * This file contains the main theme options functionality.
 * ------------------------------------------------------------------------*/

/**
 * ADD THE ACTIONS
 */
if ( isset($_GET['page']) && $_GET['page'] == HANA_OPTIONS_PAGE ){
	$hana_panel_manager = new Hana_Panel_Manager(HANA_THEMENAME, HANA_IMAGES_URL, HANA_VERSION);
	
	//options actions
	add_action('init', 'hana_init_panel_functionality', 11); 
}

/**
 * Inits the options functionality. Loads the files that contain the options arrays
 * to populate the options array of the panel.
 */
function hana_init_panel_functionality(){
	
	//load the files that contain the options
	$hana_options_files=array('general', 'pages', 'sliders', 'styles', 'translation', 'documentation');
	foreach($hana_options_files as $file){
		require_once(HANA_OPTIONS_PATH.$file.'.php');
	}

}

/**
 * Calls the panel manager to print the Panel page.
 */
function hana_print_panel() {
	global $hana_panel_manager;
	$hana_panel_manager->print_panel();
}


/**
 * Adds all the options that an array contains to the current global options array.
 * @param $option_arr the array that contains the options values
 */
function hana_add_options($option_arr){
	global $hana_panel_manager;
	$hana_panel_manager->add_options($option_arr);
}


/**
 * Prints an option.
 * @param $option the option's second part of the ID (after the theme's shortname part)
 */
function hana_echo_option($option){
	echo(stripslashes(get_option(HANA_SHORTNAME.$option)));
}

/**
 * Gets an option
 * @param $option the option's second part of the ID (after the theme's shortname part)
 */
function hana_get_opt($option){
	return stripslashes(get_option(HANA_SHORTNAME.$option));
}

/**
 * Returns the checked options from a multicheck widget in an array.
 * @param $option the option ID
 */
function hana_get_multiopt($option){
	$res=array();
	if(hana_get_opt($option)){
		$res=explode(',', hana_get_opt($option));
	}
	return $res;
}

/**
 * Returns the options from a custom option field
 * @param $option the option ID
 */
function hana_get_google_fonts(){
	$res=array();
	$fonts=get_option('hana_google_fonts_names');
	if($fonts){
		$res=explode(HANA_SEPARATOR, $fonts);
		array_pop($res);
	}elseif(!get_option('hana_first_save')){
		$res=explode(HANA_SEPARATOR, HANA_GOOGLE_FONTS);
		array_pop($res);
	}
	return $res;
}


/**
 * Gets an array containing options settings and if there is an option for adding
 * multiple entities of one type, generates addional array elements for these entities.
 * For example: If there have been created 2 additional sliders, it will append
 * to option elements to this array for each slider.
 * @param $opt_array the array to be modified
 * @return an array containing the custom entity options
 */
function hana_add_custom_options($opt_array){
	$new_hana_options=array();

	foreach($opt_array as $option){
		if($option['type']=='multiple_custom'){
			//insert the new custom options here
				
			$saved_values=get_option($option['refers']);
			$saved_array=explode(HANA_SEPARATOR, $saved_values);
			if(sizeof($saved_array)>1){
				array_pop($saved_array);
				foreach($saved_array as $custom_name){
					$id=convert_to_class($custom_name);
					$custom_option=array(
					"id"=>$id,
					"name"=>$option["name"].$custom_name,
					"button_text"=>$option["button_text"],
					"type"=>"custom",
					"preview"=>$id.$option["preview"]
					);
						
					//generate new fields with different unique IDs
					$fields=$option['fields'];
					for($i=0; $i<sizeof($fields);$i++){
						$fields[$i]['id']=$id.$fields[$i]['id'];
					}
						
					$custom_option['fields']=$fields;
						
					array_push($new_hana_options, $custom_option);
				}
			}
				
		}else{
			//this is just a normal option, just append it into the new array
			array_push($new_hana_options, $option);
		}
	}

	return $new_hana_options;
}

function get_bg_style_options($option) {
	global $patterns;
	
	extract($option);
	
	if(isset($set) && $set == 'color') 
		$bg_options = array(array("id"=>"color", "name"=>"Color"), array("id"=>"pattern", "name"=>"Color and Pattern"));
	else
		$bg_options = array(array("id"=>"color", "name"=>"Color"), array("id"=>"pattern", "name"=>"Color and Pattern"), array("id"=>"image", "name"=>"Image"));
		
	$options = array(
	
array(
"name" => $name." Background",
"id" => HANA_SHORTNAME."_".$prefix."_bg",
"type" => "select",
"options" => $bg_options,
"std" => "color",
"conditional" => "true"
),

array(
"name" => $name." Bg Color",
"id" => HANA_SHORTNAME."_".$prefix."_bg_color",
"type" => "color",
"desc" => 'You can select a background color for your theme.'
),

array(
"name" => $name." Bg Color Opacity",
"id" => HANA_SHORTNAME."_".$prefix."_bg_color_opacity",
"type" => "text",
"std" => "1",
"desc" => 'You can set the background opacity.'
),

array(
"type" => "div",
"class" => HANA_SHORTNAME."_".$prefix."_bg-pattern"
),

array(
"name" => $name." Bg Pattern",
"id" => HANA_SHORTNAME."_".$prefix."_bg_pattern",
"type" => "pattern",
"options" => $patterns,
"desc" => 'Here you can choose the pattern for the theme. There are 2 types of patterns - the first 17 patterns best suit
the white skin, the rest of them best suit the dark skins.'
),

array(
"name" => "Custom ".$name." Bg Pattern",
"id" => HANA_SHORTNAME."_".$prefix."_custom_bg_pattern",
"type" => "upload",
"desc" => 'You can upload your custom background image here.'
),

array(
"type" => "close"
)

	);

	$image_options = array(

array(
"type" => "div",
"class" => HANA_SHORTNAME."_".$prefix."_bg-image"
),

array(
"name" => $name." Bg Image",
"id" => HANA_SHORTNAME."_".$prefix."_bg_image",
"type" => "upload",
"desc" => 'You can upload a custom background image that will be displayed in full width size.'
),

array(
"name" => $name." Bg Image Repeat",
"id" => HANA_SHORTNAME."_".$prefix."_bg_repeat",
"type" => "select",
"options" => array( array("id"=>"no-repeat", "name"=>"No Repeat"), array("id"=>"repeat-x", "name"=>"Repeat Vertically"), array("id"=>"repeat-y", "name"=>"Repeat Horizontally"), array("id"=>"repeat", "name"=>"Repeat both" )),
"std" => "no-repeat",
"desc" => 'You can set if/how a background image will be repeated.'
),

array(
"name" => $name." Bg Image Position",
"id" => HANA_SHORTNAME."_".$prefix."_bg_position",
"type" => "select",
"options" => array( array("id"=>"inherit", "name"=>"Inherit"), array("id"=>"left top", "name"=>"Left Top"), array("id"=>"left center", "name"=>"Left Center"), array("id"=>"left bottom", "name"=>"Left Bottom" ), array("id"=>"center top", "name"=>"Center Top"), array("id"=>"center center", "name"=>"Center Center" ), array("id"=>"center bottom", "name"=>"Center Bottom"), array("id"=>"right top", "name"=>"Right Top"),  array("id"=>"right center", "name"=>"Right Center" ), array("id"=>"right bottom", "name"=>"Right Bottom" )),
"std" => "inherit",
"desc" => 'You can set the position attribute of background image uploaded above.'
),

array(
"name" => $name." Bg Image Attachment",
"id" => HANA_SHORTNAME."_".$prefix."_bg_attachment",
"type" => "select",
"options" => array( array("id"=>"scroll", "name"=>"Scroll"), array("id"=>"fixed", "name"=>"Fixed")),
"std" => "scroll",
"desc" => 'You can set background attachment attribute. default: Scroll'
),

array(
"type" => "close"
)
	);
	
	if(!isset($set) || $set != 'color') $options = array_merge($options, $image_options);
	
	$prefix_length = strlen(HANA_SHORTNAME."_".$prefix."_");
	if(!empty($stds)) foreach($options as &$option) {
		if(!isset($option["id"])) continue;
		$temp = substr($option["id"],$prefix_length);
		if(isset($stds[$temp])) $option["std"]=$stds[$temp];
	}
	
	return $options;
}

?>