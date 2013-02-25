<?php
/**
 * This file contains all the shortcodes and TinyMCE formatting buttons functionality.
 *
 * @author Hana
 */


// widgets
include_once HANA_SHORTCODES_PATH . 'widget.php';

// content
include_once HANA_SHORTCODES_PATH . 'content.php'; 


/* ------------------------------------------------------------------------*
 * ADD CUSTOM FORMATTING BUTTONS
 * ------------------------------------------------------------------------*/

$hana_data->buttons['styling_buttons']=array("hanaintro", "hanatitle", "hanahighlight1", "hanahighlight2", "hanadropcaps", "hanalinebreak", "|", "hanalistcheck", "hanaliststar", "hanalistarrow", "hanalistarrow2", "hanalistarrow4", "hanalistplus", "|", 
"hanaframe", "hanalightbox", "hanaimagelink", "hanabutton", "hanainfoboxes", "hanaslider", "hanapricingtable", "hanatestimonials");
$hana_data->buttons['content_buttons']=array("hanatwocolumns", "hanathreecolumns", "hanafourcolumns", "|", "hanayoutube", "hanavimeo", "hanaflash");

function add_hana_buttons() {
	if ( get_user_option('rich_editing') == 'true') {
		add_filter('mce_external_plugins', 'hana_add_btn_tinymce_plugin');
		add_filter('mce_buttons_3', 'hana_register_styling_buttons');
		add_filter('mce_buttons_4', 'hana_register_content_buttons');
	}
}

add_action('init', 'add_hana_buttons');


/**
 * Register the buttons
 * @param $buttons
 */
function hana_register_styling_buttons($buttons) {
	global $hana_data;
	
	array_push($buttons, implode(',',$hana_data->buttons['styling_buttons']));
	return $buttons;
}

/**
 * Add the buttons
 * @param $plugin_array
 */
function hana_add_btn_tinymce_plugin($plugin_array) {
	global $hana_data;
	$merged_buttons=array_merge($hana_data->buttons['styling_buttons'], $hana_data->buttons['content_buttons']);
	foreach($merged_buttons as $btn){
		$plugin_array[$btn] = HANA_SHORTCODES_URL.'formatting-buttons/editor-plugin.js';
	}
	return $plugin_array;
}

/**
 * Register the buttons
 * @param $buttons
 */
function hana_register_content_buttons($buttons) {
	global $hana_data;
	
	array_push($buttons, implode(',',$hana_data->buttons['content_buttons']));
	return $buttons;
}

?>