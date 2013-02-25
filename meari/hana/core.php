<?php
/**
 * Core of Framework  
 * 
 * Main includes for all framework.  
 * @author Hana
 */

define("HANA_PATH", 	get_template_directory() . '/hana/');
define("HANA_URL", 		get_template_directory_uri() . '/hana/');

global $wp_version;
if(version_compare($wp_version, '3.4.0')>=0) {
	$theme_info = wp_get_theme();
	$theme_version = $theme_info->Version;
}
define("HANA_VERSION", 			$theme_version);

define("HANA_PANEL_PATH", 		HANA_PATH . 'panel/');
define("HANA_INC_PATH", 		HANA_PATH . 'includes/');
define("HANA_INC_URL", 			HANA_URL . 'includes/');
define("HANA_CLASSES_PATH",		HANA_PATH . 'classes/');
define("HANA_OPTIONS_PATH", 	HANA_PATH . 'options/');
define("HANA_SHORTCODES_PATH", 	HANA_PATH . 'shortcodes/');
define("HANA_SHORTCODES_URL", 	HANA_URL . 'shortcodes/');
define("HANA_IMAGES_URL",		HANA_INC_URL . 'images/');
define("HANA_CSS_URL", 			HANA_INC_URL . 'css/');
define("HANA_SCRIPT_URL", 		HANA_INC_URL . 'js/');
define("HANA_PATTERNS_URL", 	HANA_IMAGES_URL . 'pattern_samples/');
define("HANA_FRONT_IMAGES_URL", get_template_directory_uri().'/images/');
define("HANA_FRONT_SCRIPT_URL", get_template_directory_uri().'/js/');
define("HANA_FRONT_CSS_URL", 	get_template_directory_uri().'/css/');
define("HANA_UTILS_URL", 		HANA_URL . 'utils/');
define("HANA_TIMTHUMB_URL", 	HANA_UTILS_URL . 'timthumb.php');
$uploadsdir=wp_upload_dir();
define("HANA_UPLOADS_URL", 		$uploadsdir['url']);

//other constants
define("HANA_PORTFOLIO_POST_TYPE", 'portfolio');
define("HANA_SEPARATOR", 		'|*|');
define("HANA_OPTIONS_PAGE", 	'hana_options');
define("HANA_GOOGLE_FONTS", 	"http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic".HANA_SEPARATOR);


//define gloabl
$hana_data=new stdClass();

//include classes
require_once (HANA_CLASSES_PATH.'class-hana-metabox-manager.php');
require_once (HANA_CLASSES_PATH.'class-hana-sidebar-manager.php');
require_once (HANA_CLASSES_PATH.'class-hana-templater.php');
require_once (HANA_CLASSES_PATH.'class-hana-custompage-manager.php');

if ( isset($_GET['page']) && $_GET['page'] == HANA_OPTIONS_PAGE ){
	require_once (HANA_CLASSES_PATH.'class-hana-panel-manager.php');
}


//include functions
if(is_admin()) {
	require_once (HANA_PATH.'admin-init.php');
	require_once (HANA_PATH.'admin-hooks.php');
} else {
	require_once (HANA_PATH.'front-hooks.php');
	require_once (HANA_PATH.'functions-template.php');
}
require_once (HANA_PATH.'functions-general.php');
require_once (HANA_PATH.'functions-style.php');
require_once (HANA_PATH.'functions-metaboxes.php');
require_once (HANA_PATH.'functions-portfolio.php');
require_once (HANA_PATH.'functions-sidebars.php');
require_once (HANA_PATH.'functions-panel.php');
require_once (HANA_PATH.'functions-slider.php');
require_once (HANA_PATH.'shortcodes.php');
require_once (HANA_PATH.'widgets.php');
require_once (HANA_PATH.'ajax.php');

//register default metaboxes
require_once (HANA_PATH.'metaboxes.php');

//init theme options
require_once (HANA_PATH.'panel.php');

?>