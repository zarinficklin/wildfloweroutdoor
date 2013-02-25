<?php
/**
 * Admin Init
 *  
 * @author Hana
 */

if (function_exists('create_initial_post_types')) create_initial_post_types(); //fix for wp 3.0 beta 1
if (function_exists('add_post_type_support')) add_post_type_support( 'page', 'excerpt' );
add_theme_support( 'automatic-feed-links' );

/**
 * ADD THE ACTIONS
 */
add_action('admin_enqueue_scripts', 'hana_admin_init');
add_action('admin_head', 'hana_admin_head_add');
add_action('admin_menu', 'hana_add_theme_menu');

/**
 * Enqueues the JavaScript files needed depending on the current section.
 */
function hana_admin_init(){
	global $current_screen, $hana_custompage_manager;

	if($current_screen->base=='post'){
		//enqueue the script and CSS files for the TinyMCE editor formatting buttons and Upload functionality
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-dialog');
		wp_enqueue_script('hana-ajaxupload',HANA_SCRIPT_URL.'ajaxupload.js');
		wp_enqueue_script('hana-colorpicker',HANA_SCRIPT_URL.'colorpicker.js');
		wp_enqueue_script('hana-page-options',HANA_SCRIPT_URL.'page-options.js');

		//set the style files
		add_editor_style('hana/shortcodes/formatting-buttons/custom-editor-style.css');
		wp_enqueue_style('hana-page-style',HANA_CSS_URL.'page_style.css');
		wp_enqueue_style('hana-colorpicker-style',HANA_CSS_URL.'colorpicker.css');
	}

	if(isset($_GET['page']) && $_GET['page']==HANA_OPTIONS_PAGE){
		//enqueue the scripts for the Options page
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-dialog');
		wp_enqueue_script('hana-jquery-co',HANA_SCRIPT_URL.'jquery-co.js');
		wp_enqueue_script('hana-ajaxupload',HANA_SCRIPT_URL.'ajaxupload.js');
		wp_enqueue_script('hana-colorpicker',HANA_SCRIPT_URL.'colorpicker.js');
		wp_enqueue_script('hana-page-options',HANA_SCRIPT_URL.'page-options.js');
		wp_enqueue_script('hana-options',HANA_SCRIPT_URL.'options.js');
		
		//enqueue the styles for the Options page
		wp_enqueue_style('hana-admin-style',HANA_CSS_URL.'admin_style.css');
		wp_enqueue_style('hana-colorpicker-style',HANA_CSS_URL.'colorpicker.css');
	}

	if(isset($_GET['page']) && (in_array($_GET['page'], $hana_custompage_manager->get_custom_posttypes()) || $_GET['page']==HANA_PORTFOLIO_POST_TYPE)){
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-dialog');
		wp_enqueue_script('hana-ajaxupload',HANA_SCRIPT_URL.'ajaxupload.js');
		wp_enqueue_script('hana-page-options',HANA_SCRIPT_URL.'page-options.js');
		wp_enqueue_script('hana-custom-page',HANA_SCRIPT_URL.'custom-page.js');
		//enqueue the styles for the Options page
		wp_enqueue_style('hana-admin-style',HANA_CSS_URL.'custom_page.css');
		wp_enqueue_style('jquery-ui-dialog');
	}
	
	wp_enqueue_script(array('editor', 'thickbox', 'media-upload'));
	wp_enqueue_style('thickbox');
}

if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
    //Do redirect
    header( 'Location: '.admin_url().'admin.php?page='.HANA_OPTIONS_PAGE.'&activated=true' ) ;
}


/**
 * Inserts scripts for initializing the JavaScript functionality for the relevant section.
 */
function hana_admin_head_add(){
	
	//create JavaScript variables that will be accessible globally from all scripts
	echo '<script type="text/javascript">
	hanaUploadHandlerUrl="'.HANA_UTILS_URL.'upload-handler.php",
	hanaUploadsUrl="'.HANA_UPLOADS_URL.'";
	</script>';

	if(isset($_GET['page']) && $_GET['page']==HANA_OPTIONS_PAGE){
		//init the options js functionality
		echo '<script>jQuery(document).ready(function($) {
				hanaOptions.init({cookie:true});
		});</script>';
	}
}

/**
 * Add the main setting menu for the theme.
 */
function hana_add_theme_menu(){
	add_menu_page( HANA_THEMENAME, HANA_THEMENAME, 'delete_pages', HANA_OPTIONS_PAGE, 'hana_print_panel', HANA_IMAGES_URL.'hana_icon.png');
	add_submenu_page(HANA_OPTIONS_PAGE, HANA_THEMENAME." Settings", "".HANA_THEMENAME." Options", 'delete_pages', HANA_OPTIONS_PAGE, 'hana_print_panel');
}

?>