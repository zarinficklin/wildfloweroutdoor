<?php
/**
 * Admin Hooks   
 * 
 * @author Hana
 */


add_action( 'admin_init', 'hana_theme_check_clean_installation' );
function hana_theme_check_clean_installation(){
	add_action( 'admin_notices', 'hana_theme_panel_reminder' );
}

function hana_theme_panel_reminder(){
	global $current_screen, $wp_version;;
		
	if ( false === hana_get_opt( '_logo_image' ) && $_GET['page']!=HANA_OPTIONS_PAGE ){
		printf( __('<div class="updated"><p>This is a fresh installation of %1$s theme. Don\'t forget to go to <a href="%2$s">panel</a> to set it up. This message will disappear once you have clicked the Save button within the <a href="%2$s">theme\'s options page</a>.</p></div>',HANA_THEMENAME), (version_compare($wp_version, '3.4.0')>=0)?wp_get_theme():get_current_theme(), admin_url( 'admin.php?page=hana_options' ) );
	}
}

?>